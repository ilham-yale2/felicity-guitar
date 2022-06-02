

<?php $__env->startSection('title', 'Admin Category'); ?>

<?php $__env->startSection('page', 'Category > Category List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <h3 calss="mb-2">Category List</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                
                <a class="btn btn-primary mb-2 ml-3" href="<?php echo e(route('category.create')); ?>"><i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-plus-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                    </i> Add Category</a>
                <div class="table-responsive mb-4">
                    <table id="zero-config" class="table style-3 table-hover">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            
                                <tr>
                                    <td class="">
                                        <?php echo e($c->name); ?>

                                    </td>
                                    <td class="text-center">
                                        <ul class="table-controls">
                                            <li><a href="<?php echo e(route('category.show', $c->id)); ?>" class="bs-tooltip"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-edit-2 p-1 br-6 mb-1">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg></a></li>
                                            <li>
                                                <a href="#" onclick="doDelete(<?php echo e($c->id); ?>, `<?php echo e($c->name); ?>`)" class="bs-tooltip"
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
                                                <form action="<?php echo e(route('category.destroy', ['category' => $c->id])); ?>"
                                                    method="POST" id="form-delete-<?php echo e($c->id); ?>">
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
<?php
    $menu = 'category'
?>


<?php $__env->startSection('js'); ?>
    <script>
        function doDelete(id, name) {

            Swal.fire({
                title: `Are you sure to delete ${name}?`,
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

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/category/index.blade.php ENDPATH**/ ?>