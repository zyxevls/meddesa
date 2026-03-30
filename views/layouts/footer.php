    <!-- Footer -->
    <footer class="mt-8 py-8 border-t border-slate-200 bg-white">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-slate-600 text-sm">© 2026 MedDesa. Sistem Manajemen Klinik Desa.</p>
                </div>
                <div class="text-slate-500 text-sm">
                    <span>Developed with <i class="fas fa-heart text-red-500"></i> for better healthcare</span>
                </div>
            </div>
        </div>
    </footer>
    <?php echo flash()->render('html'); ?>
    <script>
        (function($) {
            if (!$) {
                return;
            }

            var $contentRoot = $('#dashboard-content');
            if (!$contentRoot.length) {
                return;
            }

            var MAX_CACHE = 12;
            var cacheOrder = [];
            var pageCache = {};
            var currentPath = window.location.pathname;

            function isAdminPath(path) {
                return typeof path === 'string' && path.indexOf('/admin/') !== -1;
            }

            function normalizePath(path) {
                if (!path) {
                    return '';
                }
                return path.split('#')[0];
            }

            function setLoadingState(isLoading) {
                $contentRoot.stop(true, true).fadeTo(140, isLoading ? 0.55 : 1);
            }

            function cachePage(path, html) {
                if (!path || !html) {
                    return;
                }

                if (!pageCache[path]) {
                    cacheOrder.push(path);
                }

                pageCache[path] = html;

                while (cacheOrder.length > MAX_CACHE) {
                    var oldestKey = cacheOrder.shift();
                    delete pageCache[oldestKey];
                }
            }

            function getCachedPage(path) {
                return pageCache[path] || null;
            }

            function updateActiveSidebar(path) {
                $('a[data-nav-prefix]').each(function() {
                    var $link = $(this);
                    var prefix = $link.data('nav-prefix') || '';
                    var isActive = prefix && path.indexOf(prefix) === 0;

                    if (isActive) {
                        $link.addClass('bg-blue-600/90 text-white shadow-lg shadow-blue-900/25');
                        $link.removeClass('text-slate-300 hover:bg-slate-700 hover:text-white');
                    } else {
                        $link.removeClass('bg-blue-600/90 text-white shadow-lg shadow-blue-900/25');
                        $link.addClass('text-slate-300 hover:bg-slate-700 hover:text-white');
                    }
                });
            }

            function runScriptsInContent() {
                $contentRoot.find('script').each(function() {
                    var src = $(this).attr('src');

                    if (src) {
                        $.ajax({
                            url: src,
                            dataType: 'script',
                            cache: true,
                            async: false
                        });
                    } else {
                        $.globalEval(this.text || this.textContent || this.innerHTML || '');
                    }
                });
            }

            function parseIncomingHtml(html) {
                var doc = new DOMParser().parseFromString(html, 'text/html');
                var incomingContent = doc.getElementById('dashboard-content');
                var titleNode = doc.querySelector('title');

                return {
                    content: incomingContent ? incomingContent.innerHTML : null,
                    title: titleNode ? titleNode.textContent : null
                };
            }

            function renderPage(path, html, shouldPushState) {
                window.scrollTo(0, 0);
                $contentRoot.html(html);
                runScriptsInContent();
                updateActiveSidebar(path);

                if (shouldPushState) {
                    history.pushState({
                        path: path
                    }, '', path);
                }
            }

            function fetchAndRender(path, shouldPushState) {
                var normalizedPath = normalizePath(path);

                if (!isAdminPath(normalizedPath)) {
                    window.location.href = normalizedPath;
                    return;
                }

                var cached = getCachedPage(normalizedPath);
                if (cached) {
                    renderPage(normalizedPath, cached, shouldPushState);
                    return;
                }

                setLoadingState(true);

                $.ajax({
                    url: normalizedPath,
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }).done(function(responseHtml) {
                    var parsed = parseIncomingHtml(responseHtml);

                    if (!parsed.content) {
                        window.location.href = normalizedPath;
                        return;
                    }

                    if (parsed.title) {
                        document.title = parsed.title;
                    }

                    cachePage(normalizedPath, parsed.content);
                    renderPage(normalizedPath, parsed.content, shouldPushState);
                }).fail(function() {
                    window.location.href = normalizedPath;
                }).always(function() {
                    setLoadingState(false);
                });
            }

            cachePage(currentPath, $contentRoot.html());
            updateActiveSidebar(currentPath);

            $(document).on('click', 'a', function(event) {
                var $link = $(this);
                var href = $link.attr('href');

                if ($link.hasClass('handle-swal')) {
                    return;
                }

                if (!href || href.charAt(0) === '#') {
                    return;
                }

                if (/^(https?:)?\/\//i.test(href) || href.indexOf('mailto:') === 0 || href.indexOf('tel:') === 0) {
                    return;
                }

                if ($link.attr('target') === '_blank' || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
                    return;
                }

                var normalizedHref = normalizePath(href);
                if (!isAdminPath(normalizedHref)) {
                    return;
                }

                event.preventDefault();
                fetchAndRender(normalizedHref, true);
            });

            $(window).on('popstate', function() {
                fetchAndRender(window.location.pathname, false);
            });

            // Live Clock SPA-Friendly
            (function() {
                const formatter = new Intl.DateTimeFormat('en-GB', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                });

                const updateClock = () => {
                    const clockEl = document.getElementById('live-time');
                    if (clockEl) {
                        clockEl.textContent = formatter.format(new Date());
                    }
                };

                updateClock();
                setInterval(updateClock, 1000);
            })();
        })(window.jQuery);
    </script>
    </body>

    </html>