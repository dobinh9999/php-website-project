<?php
    $stmt = $conn->prepare("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 4");
    $stmt->execute();
    $result = $stmt->get_result();
?>

<link rel="stylesheet" href="app/assets/css/blogs.css">
<div class="blog-section p-20">
    <div class="blog-head flex flex-center-2">
        <h2 class="f-24">Góc làm đẹp - Sự kiện</h2>
        <a href="?action=blogs" class="view-more">Xem tất cả</a>
    </div>
    <div class="blog-posts flex">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="blog-post flex flex-column">
                <img src="<?php $row['img_url'] = str_replace('../..', 'admin', $row['img_url']); echo $row['img_url']; ?>" alt="Blog Image" class="blog-image">
                <div class="blog-details">
                    <span class="blog-date f-12"><?php echo date("d/m/Y", strtotime($row['created_at'])); ?></span>
                    <h3 class="blog-title f-18"><?php echo $row['title']; ?></h3>
                    <p class="blog-content f-14"><?php echo mb_strimwidth($row['content'], 0, 100, "..."); ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>