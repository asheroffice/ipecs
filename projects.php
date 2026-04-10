<?php
$projects = require __DIR__ . '/assets/include/projects-data.php';

function ipc_projects_esc_nl(?string $text): string
{
    if ($text === null || $text === '') {
        return '';
    }

    return nl2br(htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'), false);
}

/**
 * Markup for “full details” modal (Client, Area, Scope, Status).
 */
function ipc_project_details_inner_html(array $p): string
{
    $blocks = [
        ['label' => 'Client', 'key' => 'client'],
        ['label' => 'Area of project', 'key' => 'area'],
        ['label' => 'Scope of work', 'key' => 'scope'],
        ['label' => 'Status', 'key' => 'status'],
    ];
    $out = '';
    foreach ($blocks as $b) {
        $raw = (string) ($p[$b['key']] ?? '');
        $plain = trim(strip_tags(str_replace(["\r\n", "\r"], "\n", $raw)));
        $isEmpty = $plain === '' || $plain === '—' || $plain === '--';
        $inner = $isEmpty
            ? '<p class="project-details-block__empty mb-0">—</p>'
            : '<div class="project-details-block__value">' . ipc_projects_esc_nl($raw) . '</div>';
        $out .= '<section class="project-details-block" aria-label="' . htmlspecialchars($b['label'], ENT_QUOTES, 'UTF-8') . '">';
        $out .= '<h3 class="project-details-block__label">' . htmlspecialchars($b['label'], ENT_QUOTES, 'UTF-8') . '</h3>';
        $out .= $inner;
        $out .= '</section>';
    }

    return $out;
}

$count_all = count($projects);
$count_ongoing = count(array_filter($projects, static fn ($p) => ($p['status_key'] ?? '') === 'ongoing'));
$count_completed = count(array_filter($projects, static fn ($p) => ($p['status_key'] ?? '') === 'completed'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>IPECS Consulting PVT Ltd. | Projects</title>
    <meta name="description" content="IPECS Consulting — portfolio of development, WASH, surveys, and resilience projects across Sindh and Pakistan.">
    <meta name="keywords" content="IPECS,Projects,WASH,Sindh,Consulting,Monitoring">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@300;400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body class="home-page">

    <?php include __DIR__ . '/assets/include/header.php'; ?>

    <section class="contact-hero projects-page-hero">
        <div class="contact-hero-deco" aria-hidden="true">
            <span class="contact-hero-ring contact-hero-ring--1"></span>
            <span class="contact-hero-ring contact-hero-ring--2"></span>
            <span class="contact-hero-blob"></span>
        </div>
        <div class="container">
            <div class="contact-hero-inner">
                <h1 class="contact-title">Our projects</h1>
                <p class="contact-subtitle mb-0">A transparent record of assignments — from ongoing feasibility and surveys to completed WASH, housing, M&amp;E, and resilience programmes with government, donors, and partners.</p>
            </div>
        </div>
    </section>

    <section class="projects-content-section">
        <div class="container">

            <div class="projects-stats row g-3 mb-4 mb-lg-5">
                <div class="col-sm-4">
                    <div class="projects-stat-card">
                        <span class="projects-stat-card__icon" aria-hidden="true"><i class="bx bx-collection"></i></span>
                        <span class="projects-stat-card__value"><?php echo (int) $count_all; ?></span>
                        <span class="projects-stat-card__label">Total listed</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="projects-stat-card projects-stat-card--live">
                        <span class="projects-stat-card__icon" aria-hidden="true"><i class="bx bx-time-five"></i></span>
                        <span class="projects-stat-card__value"><?php echo (int) $count_ongoing; ?></span>
                        <span class="projects-stat-card__label">Ongoing</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="projects-stat-card projects-stat-card--done">
                        <span class="projects-stat-card__icon" aria-hidden="true"><i class="bx bx-check-circle"></i></span>
                        <span class="projects-stat-card__value"><?php echo (int) $count_completed; ?></span>
                        <span class="projects-stat-card__label">Completed</span>
                    </div>
                </div>
            </div>

            <div class="projects-toolbar">
                <div class="projects-toolbar__filters" role="group" aria-label="Filter by project status">
                    <span class="projects-toolbar__legend">Status</span>
                    <button type="button" class="btn projects-filter-btn active" data-project-filter="all">All</button>
                    <button type="button" class="btn projects-filter-btn" data-project-filter="ongoing">Ongoing</button>
                    <button type="button" class="btn projects-filter-btn" data-project-filter="completed">Completed</button>
                </div>
                <div class="projects-toolbar__views" role="group" aria-label="Layout">
                    <span class="projects-toolbar__legend">View</span>
                    <button type="button" class="btn projects-view-btn active" data-project-view="cards" aria-pressed="true"><i class="bx bx-grid-alt" aria-hidden="true"></i> Cards</button>
                    <button type="button" class="btn projects-view-btn" data-project-view="table" aria-pressed="false"><i class="bx bx-table" aria-hidden="true"></i> Table</button>
                </div>
            </div>

            <p class="projects-empty-msg text-center d-none" id="projects-empty-msg" role="status">No projects match this filter.</p>

            <div class="projects-cards-grid" id="projects-cards-view">
                <div class="projects-card-col projects-card-col--sizer" aria-hidden="true"></div>
                <?php foreach ($projects as $idx => $p) :
                    $sk = $p['status_key'] ?? 'completed';
                    $details_src_id = 'project-details-src-' . (int) $idx;
                    $details_modal_title = preg_replace('/\s+/u', ' ', trim((string) ($p['title'] ?? '')));
                    if ($details_modal_title === '') {
                        $details_modal_title = 'Project details';
                    }
                    ?>
                    <div class="projects-card-col" data-status="<?php echo htmlspecialchars($sk, ENT_QUOTES, 'UTF-8'); ?>">
                        <article class="project-card">
                            <header class="project-card__banner">
                                <div class="project-card__banner-meta">
                                    <span class="project-card__year"><?php echo ipc_projects_esc_nl($p['year'] ?? ''); ?></span>
                                    <span class="project-card__badge project-card__badge--<?php echo $sk === 'ongoing' ? 'ongoing' : 'completed'; ?>">
                                        <?php echo $sk === 'ongoing' ? 'Ongoing' : 'Completed'; ?>
                                    </span>
                                </div>
                                <h2 class="project-card__title"><?php echo ipc_projects_esc_nl($p['title'] ?? ''); ?></h2>
                            </header>
                            <div class="project-card__body">
                                <section class="project-card__section project-card__section--client" aria-label="Client">
                                    <h3 class="project-card__label">Client</h3>
                                    <div class="project-card__value"><?php echo ipc_projects_esc_nl($p['client'] ?? ''); ?></div>
                                </section>
                                <section class="project-card__section project-card__section--status project-card__section--compact" aria-label="Status">
                                    <h3 class="project-card__label">Status</h3>
                                    <div class="project-card__value project-card__value--status"><?php echo ipc_projects_esc_nl($p['status'] ?? ''); ?></div>
                                </section>
                                <div class="project-card__details-action">
                                    <button type="button" class="btn project-details-btn" data-bs-toggle="modal" data-bs-target="#projectDetailsModal" data-details-target="<?php echo htmlspecialchars($details_src_id, ENT_QUOTES, 'UTF-8'); ?>" data-details-title="<?php echo htmlspecialchars($details_modal_title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
                                        <i class="bx bx-expand-alt" aria-hidden="true"></i> See full details
                                    </button>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="project-details-sources d-none" aria-hidden="true">
                <?php foreach ($projects as $idx => $p) : ?>
                    <div id="project-details-src-<?php echo (int) $idx; ?>" class="project-details-source"><?php echo ipc_project_details_inner_html($p); ?></div>
                <?php endforeach; ?>
            </div>

            <div class="projects-table-view d-none" id="projects-table-view">
                <div class="projects-table-scroll">
                    <table class="table projects-data-table align-middle">
                        <colgroup>
                            <col class="projects-col-year" span="1">
                            <col class="projects-col-title" span="1">
                            <col class="projects-col-client" span="1">
                            <col class="projects-col-status" span="1">
                            <col class="projects-col-details" span="1">
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="col">Year</th>
                                <th scope="col">Project name</th>
                                <th scope="col">Client</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center text-md-end">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($projects as $idx => $p) :
                                $sk = $p['status_key'] ?? 'completed';
                                $details_src_id = 'project-details-src-' . (int) $idx;
                                $details_modal_title = preg_replace('/\s+/u', ' ', trim((string) ($p['title'] ?? '')));
                                if ($details_modal_title === '') {
                                    $details_modal_title = 'Project details';
                                }
                                ?>
                                <tr data-status="<?php echo htmlspecialchars($sk, ENT_QUOTES, 'UTF-8'); ?>">
                                    <td><?php echo ipc_projects_esc_nl($p['year'] ?? ''); ?></td>
                                    <td><?php echo ipc_projects_esc_nl($p['title'] ?? ''); ?></td>
                                    <td><?php echo ipc_projects_esc_nl($p['client'] ?? ''); ?></td>
                                    <td><?php echo ipc_projects_esc_nl($p['status'] ?? ''); ?></td>
                                    <td class="text-center text-md-end text-nowrap">
                                        <button type="button" class="btn btn-sm project-details-btn project-details-btn--table" data-bs-toggle="modal" data-bs-target="#projectDetailsModal" data-details-target="<?php echo htmlspecialchars($details_src_id, ENT_QUOTES, 'UTF-8'); ?>" data-details-title="<?php echo htmlspecialchars($details_modal_title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
                                            <i class="bx bx-expand-alt" aria-hidden="true"></i> See full details
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

    <div class="modal fade" id="projectDetailsModal" tabindex="-1" aria-labelledby="projectDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content project-details-modal-content">
                <div class="modal-header">
                    <h2 class="modal-title h5 mb-0" id="projectDetailsModalLabel">Project details</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body project-details-modal-body" id="projectDetailsModalBody"></div>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/assets/include/footer.php'; ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/isotope.pkgd.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        jQuery(function ($) {
            var $grid = $('#projects-cards-view');
            var rows = document.querySelectorAll('.projects-data-table tbody tr');
            var emptyMsg = document.getElementById('projects-empty-msg');
            var cardsView = document.getElementById('projects-cards-view');
            var tableView = document.getElementById('projects-table-view');
            var hasIso = false;

            function countVisibleCards(iso) {
                if (!iso || typeof iso.getFilteredItemElements !== 'function') return 0;
                return iso.getFilteredItemElements().length;
            }

            function applyTableFilter(filter) {
                rows.forEach(function (row) {
                    var show = filter === 'all' || row.getAttribute('data-status') === filter;
                    row.classList.toggle('d-none', !show);
                });
            }

            function updateEmptyMessage(iso) {
                if (!emptyMsg) return;
                if (hasIso && iso) {
                    emptyMsg.classList.toggle('d-none', countVisibleCards(iso) > 0);
                } else {
                    var n = 0;
                    document.querySelectorAll('.projects-card-col:not(.projects-card-col--sizer)').forEach(function (col) {
                        if (!col.classList.contains('d-none')) n++;
                    });
                    emptyMsg.classList.toggle('d-none', n > 0);
                }
            }

            function applyFilterCards(filter) {
                if (hasIso && $grid.length && typeof $grid.isotope === 'function') {
                    var sel = filter === 'all' ? '*' : '[data-status="' + filter + '"]';
                    $grid.isotope({ filter: sel });
                    return;
                }
                document.querySelectorAll('.projects-card-col:not(.projects-card-col--sizer)').forEach(function (col) {
                    var show = filter === 'all' || col.getAttribute('data-status') === filter;
                    col.classList.toggle('d-none', !show);
                });
                updateEmptyMessage(null);
            }

            function applyFilter(filter) {
                applyTableFilter(filter);
                applyFilterCards(filter);
            }

            $('[data-project-filter]').on('click', function () {
                var f = this.getAttribute('data-project-filter') || 'all';
                $('[data-project-filter]').removeClass('active');
                $(this).addClass('active');
                applyFilter(f);
            });

            $('[data-project-view]').on('click', function () {
                var view = this.getAttribute('data-project-view');
                $('[data-project-view]').removeClass('active').attr('aria-pressed', 'false');
                $(this).addClass('active').attr('aria-pressed', 'true');
                if (view === 'table') {
                    cardsView.classList.add('d-none');
                    tableView.classList.remove('d-none');
                } else {
                    tableView.classList.add('d-none');
                    cardsView.classList.remove('d-none');
                    if (hasIso && typeof $grid.isotope === 'function') {
                        $grid.isotope('layout');
                    }
                }
            });

            if ($grid.length && typeof $.fn.isotope === 'function') {
                try {
                    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                    $grid.isotope({
                        itemSelector: '.projects-card-col:not(.projects-card-col--sizer)',
                        layoutMode: 'masonry',
                        masonry: {
                            columnWidth: '.projects-card-col--sizer',
                            gutter: 0
                        },
                        percentPosition: true,
                        transitionDuration: reduceMotion ? 0 : '0.45s',
                        stagger: reduceMotion ? 0 : 24,
                        hiddenStyle: { opacity: 0 },
                        visibleStyle: { opacity: 1 }
                    });
                    hasIso = true;
                    $grid.on('arrangeComplete', function () {
                        updateEmptyMessage($grid.data('isotope'));
                    });
                    $(window).on('resize', function () {
                        if (!cardsView.classList.contains('d-none') && hasIso) {
                            $grid.isotope('layout');
                        }
                    });
                    updateEmptyMessage($grid.data('isotope'));
                } catch (err) {
                    hasIso = false;
                    if (window.console && console.warn) {
                        console.warn('Projects isotope layout disabled:', err);
                    }
                    applyFilterCards('all');
                }
            } else {
                applyFilterCards('all');
            }

            var detailsModalEl = document.getElementById('projectDetailsModal');
            if (detailsModalEl) {
                detailsModalEl.addEventListener('show.bs.modal', function (event) {
                    var btn = event.relatedTarget;
                    if (!btn || !btn.getAttribute('data-details-target')) {
                        return;
                    }
                    var src = document.getElementById(btn.getAttribute('data-details-target'));
                    var title = btn.getAttribute('data-details-title') || 'Project details';
                    var labelEl = document.getElementById('projectDetailsModalLabel');
                    var bodyEl = document.getElementById('projectDetailsModalBody');
                    if (labelEl) {
                        labelEl.textContent = title;
                    }
                    if (bodyEl) {
                        bodyEl.innerHTML = src ? src.innerHTML : '';
                    }
                });
            }
        });
    </script>
</body>

</html>
