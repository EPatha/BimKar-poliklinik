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

    
    <style>
        [x-cloak] { display: none; }
    </style>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-full sm:px-6 lg:px-8"> <!-- max-w-full agar tabel lebar -->
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <!-- Tambahkan x-data kosong agar Alpine tidak error -->
                <section x-data="{}">
                    <header class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            <?php echo e(__('Daftar Jadwal Periksa')); ?>

                        </h2>
                        <a href="<?php echo e(route('jadwal-periksa.create')); ?>"
                            class="bg-green-500 hover:bg-green-700 text-white text-xs font-semibold px-4 py-2 rounded transition">
                            Tambah Jadwal Periksa
                        </a>
                    </header>

                    <?php if(session('success')): ?>
                        <div 
                            x-data="{ show: true }" 
                            x-show="show" 
                            x-init="setTimeout(() => show = false, 3000)" 
                            x-transition 
                            class="mb-4 px-4 py-2 rounded bg-green-100 border border-green-400 text-green-800 flex items-center justify-between"
                        >
                            <span><?php echo e(session('success')); ?></span>
                            <button @click="show = false" class="ml-4 text-green-900 font-bold">&times;</button>
                        </div>
                    <?php endif; ?>

                    <div class="overflow-x-auto mt-6">
                        <table class="min-w-[900px] w-full divide-y divide-gray-200 rounded-lg overflow-hidden shadow">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mulai</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Selesai</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__currentLoopData = $jadwalPeriksa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-6 py-4"><?php echo e($no + 1); ?></td>
                                    <td class="px-6 py-4"><?php echo e($jadwal->hari); ?></td>
                                    <td class="px-6 py-4"><?php echo e(\Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i')); ?></td>
                                    <td class="px-6 py-4"><?php echo e(\Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i')); ?></td>
                                    <td class="px-6 py-4">
                                        <?php if($jadwal->status): ?>
                                            <span class="inline-block px-3 py-1 text-xs font-bold text-green-800 bg-green-200 rounded-full">Aktif</span>
                                        <?php else: ?>
                                            <span class="inline-block px-3 py-1 text-xs font-bold text-red-800 bg-red-200 rounded-full">Tidak Aktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-2">
                                            <form action="<?php echo e(route('jadwal-periksa.toggle', $jadwal->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <?php if($jadwal->status): ?>
                                                    <button type="submit"
                                                        class="bg-yellow-400 hover:bg-yellow-600 text-white text-xs font-semibold px-4 py-2 rounded transition">
                                                        Nonaktifkan
                                                    </button>
                                                <?php else: ?>
                                                    <button type="submit"
                                                        class="bg-green-500 hover:bg-green-700 text-white text-xs font-semibold px-4 py-2 rounded transition">
                                                        Aktifkan
                                                    </button>
                                                <?php endif; ?>
                                            </form>
                                            <a href="<?php echo e(route('jadwal-periksa.edit', $jadwal->id)); ?>"
                                               class="bg-blue-600 hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded transition">
                                                Edit
                                            </a>
                                            <form action="<?php echo e(route('jadwal-periksa.destroy', $jadwal->id)); ?>" method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
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