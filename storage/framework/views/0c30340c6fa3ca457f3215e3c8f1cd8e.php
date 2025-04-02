
<?php $__env->startSection('title', 'Chi tiết tin tức'); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h2 class="mb-0">Chi tiết tin tức</h2>
        </div>
        <div class="card-body">
            <h4><?php echo e($news->tieu_de); ?></h4>
            <p><strong>Mô tả:</strong> <?php echo e($news->mo_ta); ?></p>
            <p><strong>Loại tin:</strong> <?php echo e($news->category->ten_loai ?? 'Chưa có loại'); ?></p>
            <p><strong>Hình ảnh:</strong> 
                <?php if($news->hinh_anh): ?>
                    <img src="<?php echo e($news->hinh_anh); ?>" alt="Hình ảnh tin tức" style="max-width: 200px;">
                <?php else: ?>
                    Không có hình ảnh
                <?php endif; ?>
            </p>
            <p><strong>Lượt xem:</strong> <?php echo e($news->luot_xem); ?></p>
            <p><strong>Trạng thái:</strong> 
                <span class="badge <?php echo e($news->an_hien ? 'bg-danger' : 'bg-success'); ?>">
                    <?php echo e($news->an_hien ? 'Ẩn' : 'Hiện'); ?>

                </span>
            </p>
            <p><strong>Nổi bật:</strong> 
                <span class="badge <?php echo e($news->noi_bat ? 'bg-warning' : 'bg-secondary'); ?>">
                    <?php echo e($news->noi_bat ? 'Có' : 'Không'); ?>

                </span>
            </p>
            <p><strong>Ngày tạo:</strong> <?php echo e($news->created_at); ?></p>
            <p><strong>Ngày cập nhật:</strong> <?php echo e($news->updated_at); ?></p>
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(url('/')); ?>" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP3\Lab\Lab_5_PA00243\resources\views/news/show.blade.php ENDPATH**/ ?>