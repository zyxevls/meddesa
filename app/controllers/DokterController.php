<?php

class DokterController
{
    private $repo;

    private const UPLOAD_DIR = '/uploads/dokter';

    public function __construct()
    {
        $this->repo = new DokterRepository(Database::connect());
    }

    public function index()
    {
        Middleware::auth();

        $dokters = $this->repo->all();

        $content = BASE_PATH . '/views/admin/dokter/index.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function create()
    {
        Middleware::auth();

        $content = BASE_PATH . '/views/admin/dokter/create.php';
        require BASE_PATH . '/views/layouts/app.php';
    }

    public function store()
    {
        Middleware::auth();

        $imagePath = $this->handleImageUpload($_FILES['images'] ?? null);

        $this->repo->create([
            $_POST['nip'],
            $_POST['sip'],
            $_POST['nama_dokter'],
            $_POST['spesialisasi'],
            $imagePath,
            $_POST['no_telp'],
            $_POST['is_active'] ?? '1',
        ]);

        flash()->success('Dokter berhasil ditambahkan.');
        header('Location: /admin/dokter');
        exit;
    }

    public function edit($id)
    {
        Middleware::auth();

        $dokter = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/dokter/edit.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function update($id)
    {
        Middleware::auth();

        $existingImage = $_POST['existing_images'] ?? null;
        $imagePath = $this->handleImageUpload($_FILES['images'] ?? null, $existingImage);

        $this->repo->update($id, [
            $_POST['nip'],
            $_POST['sip'],
            $_POST['nama_dokter'],
            $_POST['spesialisasi'],
            $imagePath,
            $_POST['no_telp'],
            $_POST['is_active'] ?? '1',
        ]);

        flash()->success('Data dokter berhasil diperbarui.');
        header('Location: /admin/dokter');
        exit;
    }

    public function detail($id)
    {
        Middleware::auth();

        $dokter = $this->repo->find($id);
        $content = BASE_PATH . '/views/admin/dokter/detail.php';

        require BASE_PATH . '/views/layouts/app.php';
    }

    public function destroy($id)
    {
        Middleware::auth();

        $this->repo->destroy($id);

        flash()->success('Data dokter berhasil dihapus.');
        header('Location: /admin/dokter');
        exit;
    }

    private function handleImageUpload(?array $file, ?string $existingImage = null): ?string
    {
        if (!$file || !isset($file['error']) || (int) $file['error'] === UPLOAD_ERR_NO_FILE) {
            return $existingImage;
        }

        if ((int) $file['error'] !== UPLOAD_ERR_OK) {
            return $existingImage;
        }

        $maxSize = 2 * 1024 * 1024;
        if ((int) ($file['size'] ?? 0) > $maxSize) {
            return $existingImage;
        }

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $originalName = (string) ($file['name'] ?? '');
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions, true)) {
            return $existingImage;
        }

        $uploadDir = BASE_PATH . '/public' . self::UPLOAD_DIR;
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileName = 'dokter_' . date('YmdHis') . '_' . bin2hex(random_bytes(4)) . '.' . $extension;
        $targetPath = $uploadDir . '/' . $fileName;

        if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $existingImage;
        }

        if (!empty($existingImage) && strpos($existingImage, self::UPLOAD_DIR . '/') === 0) {
            $oldPath = BASE_PATH . '/public' . $existingImage;
            if (is_file($oldPath)) {
                @unlink($oldPath);
            }
        }

        return self::UPLOAD_DIR . '/' . $fileName;
    }
}
