<!-- resources/views/obat/index-dummy.blade.php -->
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
            <?php echo e(__('Daftar Obat')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tombol tambah obat -->
            <div class="mb-4 flex justify-end">
                <a href="<?php echo e(route('dokter.obat.create')); ?>"
                   class="inline-block bg-green-500 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded transition">
                    Tambah Obat
                </a>
            </div>
            <?php if(session('success')): ?>
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-init="setTimeout(() => show = false, 3000)" 
                    x-transition 
                    class="mb-4 px-4 py-3 rounded bg-green-100 border border-green-400 text-green-800 flex items-center justify-between"
                >
                    <span><?php echo e(session('success')); ?></span>
                    <button @click="show = false" class="ml-4 text-green-900 font-bold">&times;</button>
                </div>
            <?php endif; ?>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-[700px] w-full divide-y divide-gray-200 rounded-lg overflow-hidden shadow">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Obat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kemasan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__currentLoopData = $obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $obat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-6 py-4"><?php echo e($no+1); ?></td>
                                <td class="px-6 py-4"><?php echo e($obat->nama_obat); ?></td>
                                <td class="px-6 py-4"><?php echo e($obat->kemasan); ?></td>
                                <td class="px-6 py-4">Rp<?php echo e(number_format($obat->harga,0,',','.')); ?></td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-row flex-wrap gap-2">
                                        <a href="<?php echo e(route('dokter.obat.edit', $obat->id)); ?>"
                                           class="bg-blue-600 hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded transition">
                                            Edit
                                        </a>
                                        <form action="<?php echo e(route('dokter.obat.destroy', $obat->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit"
                                                    class="bg-red-600 hover:bg-red-800 text-white text-xs font-semibold px-4 py-2 rounded transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
<?php endif; ?>
<?php /**PATH /Users/ephesiansprismaranatha/Documents/Backup/bimbingan-karir-wd03-main/resources/views/dokter/obat/index.blade.php ENDPATH**/ ?>