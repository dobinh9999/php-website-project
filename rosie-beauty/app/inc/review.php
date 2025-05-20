<?php
    $stmt = $conn->prepare("SELECT * FROM brands");
    $stmt->execute();
    $result = $stmt->get_result();
?>
<link rel="stylesheet" href="app/assets/css/banner_content.css">

<!-- Brand -->
<div class="brand-section max-width text-center p-20">
    <h2 class="f-24 mb-10">Thương hiệu nổi bật</h2>
    <div class="brand-slider-container">
        <div class="brand-slider">
            <?php while ($brand = $result->fetch_assoc()) { ?>
                <div class="brand-item flex flex-center border-radius-10">
                    <img class="max-width" src="<?php echo str_replace('../..', 'admin', $brand['logo_url']); ?>" alt="<?php echo $brand['name']; ?>">
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Review -->
<div class="review-section text-center p-20 mt-10">
    <h2>Khách hàng của chúng tôi nói gì</h2>
    <div class="review-slider">
        <div class="review-item flex flex-column">
            <img src="app/assets/img/review/thumb_review_238f3.jpg" class="review-image">
            <h3>Kem Robi - Người mẫu ảnh</h3>
            <p>Công việc của mình thường xuyên tiếp xúc với đồ mỹ phẩm, nên mình rất ngại dùng phải hàng không rõ xuất xứ, nhưng từ khi mình biết tới Rosie thì mình rất yên tâm về chất lượng sản phẩm.</p>
        </div>
        <div class="review-item flex flex-column">
            <img src="app/assets/img/review/thumb_review_338f3.jpg" class="review-image">
            <h3>Quỳnh Hugo</h3>
            <p>Mình thường xuyên phải dùng mỹ phẩm khi đi công tác hoặc ra đường, vì làn da kén cá chọn canh của mình chăm sóc rất vất vả. Nhưng giờ thì mọi chuyện dễ dàng hơn nhiều khi sử dụng sản phẩm tại Rosie.</p>
        </div>
        <div class="review-item flex flex-column">
            <img src="app/assets/img/review/thumb_review_438f3.jpg" class="review-image">
            <h3>Trà My - CEO My Nails</h3>
            <p>Mình thường xuyên ghé qua đây để chăm chút bản thân, công việc của mình cũng liên quan đến đồ mỹ phẩm nên mình cảm thấy Rosie phục vụ khách hàng rất chu đáo, các bạn còn được ưu đãi thành viên nữa, mình rất thích nơi đây.</p>
        </div>
        <div class="review-item flex flex-column">
            <img src="app/assets/img/review/thumb_review_538f3.jpg" class="review-image">
            <h3>Kiều Trang</h3>
            <p>Làn da của mình thuộc kiểu da khô, thực sự mình đã tìm rất nhiều nơi bán mỹ phẩm để đáp ứng được làn da của mình, nhưng khi đến với Rosie mình như được bừng tỉnh lại với làn da mềm mịn, không còn khô ráp nữa.</p>
        </div>
    </div>
</div>

<!-- Banner Content -->
<div class="banner-content flex p-20">
    <div class="banner-image flex-1">
        <img src="app/assets/img/content/banner_content.jpg" alt="Banner Image" class="max-width">
    </div>
    <div class="banner-text flex flex-column flex-1">
        <h2 class="f-18">GIẢI PHÁP TRANG ĐIỂM DỄ DÀNG CHO PHỤ NỮ VIỆT</h2>
        <p class="f-14">Dựa trên kinh nghiệm 15 năm chinh chiến trong ngành làm đẹp và hợp tác với các tập đoàn mỹ phẩm nổi tiếng trên Thế giới, Makeup Artist Quách Ánh cùng những cộng sự của mình đã tạo nên thương hiệu mỹ phẩm Lemonade. Với các dòng sản phẩm đa công năng và tiện dụng được nghiên cứu dựa trên khí hậu và làn da của phụ nữ Việt, Lemonade giúp bạn hoàn thiện vẻ đẹp một cách nhanh chóng và dễ dàng hơn: Dễ dàng sử dụng, dễ dàng kết hợp và dễ dàng mang đi.</p>
    </div>
</div>

<script src="app/assets/js/slidesToShow.js"></script>
<script>
    initializeSlider('.review-slider', 1, false);
</script>