

<?php $__env->startSection('title', 'Admin User Mail'); ?>

<?php $__env->startSection('page', 'User Mail'); ?>

<?php $__env->startSection('content'); ?>
<?php
    $menu = 'contact';
?>
    <div class="col-lg-12">
        <h3 calss="mb-2">Mail List</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table id="zero-config" class="table style-3 table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            
                                <tr>
                                    <td class="">
                                        <?php echo e($item->name); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->email); ?>

                                    </td>
                                    <td class="text-center">
                                        <ul class="table-controls">
                                            <li>
                                                <a href="<?php echo e(route('user-contact.show', $item->id)); ?>" class="bs-tooltip"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Show">
                                                    <span class="iconify" data-icon="akar-icons:eye"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="doDelete(<?php echo e($item->id); ?>,`<?php echo e($item->name); ?>`)" class="bs-tooltip"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <form action="<?php echo e(route('user-contact.destroy', ['user_contact' => $item->id])); ?>"
                                                    method="POST" id="form-delete-<?php echo e($item->id); ?>">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php if(session()->has('message')): ?>
        <script>
            var type = "<?php echo e(session()->get('message')['status']); ?>"
            if(type == 'success'){
                var title = 'Well Done...'
            }else{
                var title = "Oops..."
            }
            setTimeout(() => {
                Swal.fire({
                    icon: type,
                    title: title,
                    text: "<?php echo e(session()->get('message')['text']); ?>",
                })
            }, 1000);
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        function doDelete(id, name) {

            Swal.fire({
                title: `Are you sure to delete mail from ${name}?`,
                text: 'Deleted data cannot be restored' ,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                   $(`#form-delete-${id}`).submit()
                }
            });

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/contact/index.blade.php ENDPATH**/ ?>