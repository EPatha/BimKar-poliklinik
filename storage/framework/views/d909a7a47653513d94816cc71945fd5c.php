<!-- resources/views/jadwal-periksa/index-dummy.blade.php -->
<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <?php echo e(__('Jadwal Periksa')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <section>
                    <header class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            <?php echo e(__('Daftar Jadwal Periksa')); ?>

                        </h2>

                        <div class="flex-col items-center justify-center text-center">
                            <a type="button" class="btn btn-primary" href="<?php echo e(route('jadwal-periksa.create')); ?>">Tambah Jadwal Periksa</a>
                        </div>
                    </header>

                    <table class="table mt-6 overflow-hidden rounded table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Mulai</th>
                                <th scope="col">Selesai</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $jadwalPeriksa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row" class="align-middle text-start"><?php echo e($no+1); ?></th>
                                    <td class="align-middle text-start"><?php echo e($jadwal->hari); ?></td>
                                    <td class="align-middle text-start"><?php echo e(\Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i')); ?></td>
                                    <td class="align-middle text-start"><?php echo e(\Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i')); ?></td>
                                    <td class="align-middle text-start">
                                        <?php if($jadwal->status): ?>
                                            <span class="badge badge-pill badge-success">Aktif</span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-danger">Tidak Aktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="align-middle text-start">
                                        <form action="<?php echo e(route('jadwal-periksa.toggle', $jadwal->id)); ?>" method="POST" style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <?php if($jadwal->status): ?>
                                                <button type="submit" class="btn btn-warning btn-sm">Nonaktifkan</button>
                                            <?php else: ?>
                                                <button type="submit" class="btn btn-success btn-sm">Aktifkan</button>
                                            <?php endif; ?>
                                        </form>
                                        <a href="<?php echo e(route('jadwal-periksa.edit', $jadwal->id)); ?>" class="btn btn-info btn-sm ms-1">Edit</a>
                                        <form action="<?php echo e(route('jadwal-periksa.destroy', $jadwal->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm ms-1">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /Users/ephesiansprismaranatha/Documents/Backup/bimbingan-karir-wd03-main/resources/views/dokter/jadwal-periksa/index.blade.php ENDPATH**/ ?>