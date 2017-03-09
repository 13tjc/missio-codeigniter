<?php $pi = $_SERVER['PATH_INFO'] ?>
<header class="inner_header">
    <div class="wrapper"> <a href="/" class="logo"><img src="/web/images/logo.png" alt=""></a>
        <?php if (isset($data['user'])): ?>
            <nav>
                <ul class="nav_bar">
                    <?php if ($data['user']['admin'] || $data['user']['national_director'] || $data['user']['diocese_director']): ?>
                        <li<?php if (strpos($pi, '/dashboard/finance') !== false): ?> class="active"<?php endif; ?>>
                            <a href="/dashboard/finance">Finance Dashboard</a>
                            <ul>
                                <li><a href="/dashboard/finance"<?php if ($pi === '/dashboard/finance'): ?> class="active"<?php endif; ?>>Finance Dashboard Home</a></li>
                                <li><a href="/dashboard/finance/donors"<?php if (strpos($pi, '/dashboard/finance/donors') !== false): ?> class="active"<?php endif; ?>>Donors</a></li>
                                <li><a href="/dashboard/finance/projects"<?php if (strpos($pi, '/dashboard/finance/projects') !== false): ?> class="active"<?php endif; ?>>Projects</a></li>
                                <li><a href="/dashboard/finance/donation-flow"<?php if (strpos($pi, '/dashboard/finance/donation-flow') !== false): ?> class="active"<?php endif; ?>>Donation Flow</a></li>
                                <li><a href="/dashboard/finance/faqs"<?php if (strpos($pi, '/dashboard/finance/faqs') !== false): ?> class="active"<?php endif; ?>>Tips &amp; FAQs</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if ($data['user']['admin']): ?>
                        <li<?php if (strpos($pi, '/dashboard/hero-manager') !== false): ?> class="active"<?php endif; ?>>
                            <a href="/dashboard/hero-manager">Hero Manager</a>
                        </li>
                        <li<?php if (strpos($pi, '/dashboard/resource-manager') !== false): ?> class="active"<?php endif; ?>>
                            <a href="/dashboard/resource-manager">Resource Manager</a>
                            <ul>
                                <li><a href="/dashboard/resource-manager">Resources</a></li>
                                <li><a href="/dashboard/resource-manager/filters">Filters</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li<?php if (strpos($pi, '/dashboard/project') !== false): ?> class="active"<?php endif; ?>>
                        <a href="/dashboard/projects">Project Dashboard</a>
                        <ul>
                            <li><a href="/dashboard/projects"<?php if ($pi === '/dashboard/projects'): ?> class="active"<?php endif; ?>>Project Dashboard Home</a></li>
                            <li><a href="http://www.propfaith.net/missio/" target="_blank">Add A New Project</a></li>
                            <li><a href="/dashboard/projects/faqs"<?php if (strpos($pi, '/dashboard/projects/faqs') !== false): ?> class="active"<?php endif; ?>>Tips &amp; FAQs</a></li>
                        </ul>
                    </li>
                </ul>
                <a href="/dashboard/logout" class="logout_link">logout</a>
            </nav>
        <?php endif; ?>
    </div>
</header>