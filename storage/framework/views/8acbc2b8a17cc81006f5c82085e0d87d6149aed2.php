<nav class="navbar navbar-expand-lg navbar-white bg-white">
    <button type="button" id="sidebarCollapse" class="btn btn-light">
        <i class="fas fa-bars"></i><span></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ms-auto">
            <!-- <li class="nav-item dropdown">
                <div class="nav-dropdown">
                    <a href="#" id="nav1" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-link"></i> <span>Quick Links</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nav-link-menu" aria-labelledby="nav1">
                        <ul class="nav-list">
                            <li><a href="" class="dropdown-item"><i class="fas fa-list"></i> Access Logs</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="" class="dropdown-item"><i class="fas fa-database"></i> Back ups</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="" class="dropdown-item"><i class="fas fa-cloud-download-alt"></i> Updates</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="" class="dropdown-item"><i class="fas fa-user-shield"></i> Roles</a></li>
                        </ul>
                    </div>
                </div>
            </li> -->
            <li class="nav-item dropdown">
                <div class="nav-dropdown">
                    <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> <span><?php echo e(Auth::user()->name); ?></span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                        <ul class="nav-list">
                            <!-- <li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                            <li><a href="" class="dropdown-item"><i class="fas fa-envelope"></i> Messages</a></li>
                            <li><a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li> -->
                            <div class="dropdown-divider"></div>
                            <!-- <li><a href="<?php echo e(url('/logout')); ?>" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </li> -->

                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'class' => 'dropdown-item','onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']]); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'class' => 'dropdown-item','onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']); ?>
                                    <i class="fas fa-sign-out-alt"></i> <?php echo e(__('Log Out')); ?></a>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </form>

                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav><?php /**PATH /home/asterprivilege/public_html/resources/views/admin/drop_nav.blade.php ENDPATH**/ ?>