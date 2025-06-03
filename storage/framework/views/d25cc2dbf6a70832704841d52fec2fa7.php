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
            <?php echo e(__('Edit Jadwal Periksa')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <form class="mt-6" action="<?php echo e(route('jadwal-periksa.update', $jadwal->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-3 form-group">
                            <label for="hariSelect">Hari</label>
                            <select class="form-control" name="hari" id="hariSelect" required>
                                <option value="">Pilih Hari</option>
                                <?php $__currentLoopData = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hari): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($hari); ?>" <?php echo e($jadwal->hari == $hari ? 'selected' : ''); ?>><?php echo e($hari); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="jamMulai">Jam Mulai</label>
                            <input type="time" class="form-control" id="jamMulai" name="jam_mulai" value="<?php echo e($jadwal->jam_mulai); ?>" required>
                        </div>
                        <div class="mb-4 form-group">
                            <label for="jamSelesai">Jam Selesai</label>
                            <input type="time" class="form-control" id="jamSelesai" name="jam_selesai" value="<?php echo e($jadwal->jam_selesai); ?>" required>
                        </div>
                        <input type="hidden" name="status" value="<?php echo e($jadwal->status); ?>">
                        <a href="<?php echo e(route('jadwal-periksa')); ?>" class="bg-red-500 hover:bg-red-700 text-white text-xs font-semibold px-4 py-2 rounded transition">Batal</a>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white text-xs font-semibold px-4 py-2 rounded transition">Update</button>
                    </form>
                </div>
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
<?php endif; ?><?php /**PATH /Users/ephesiansprismaranatha/Documents/Backup/bimbingan-karir-wd03-main/resources/views/dokter/jadwal-periksa/edit.blade.php ENDPATH**/ ?>