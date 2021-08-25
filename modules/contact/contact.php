<?php
if (isset($_POST['sbm'])) {
    $ct_name = $_POST['ct_name'];
    $ct_email = $_POST['ct_email'];
    $ct_address = $_POST['ct_address'];
    $ct_sdt = $_POST['ct_sdt'];
    $ct_title = $_POST['ct_title'];
    $ct_content = $_POST['ct_content'];
 
    $sql = "INSERT INTO contact(ct_name,ct_email,ct_sdt,ct_title,ct_content,ct_address) VALUES ('$ct_name','$ct_email','$ct_sdt','$ct_title','$ct_content','$ct_address')";
    $query = mysqli_query($conn, $sql); 
   
}

?>
<div class="box-contact">
    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="page-address">
                <ul>
                    <li>
                        <i class="fas fa-home"></i>
                        <div class="address-text">
                            <b>Địa chỉ: </b>
                            <p class="mt-2">Tòa Anland Premium, P.La Khê, Q.Hà Đông, Hà Nội</p>
                            <p>Số 9, Nguyễn Tử Nha, P.12, Q.Tân Bình, Hồ Chí Minh</p>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-globe"></i>
                        <div class="address-text">
                            <b>Website:</b>
                            <p class="mt-2">https://www.thietbiytecaocao.com.vn</p>
                        </div>
                    </li>
                    <li>
                        <i class="far fa-envelope"></i>
                        <div class="address-text">
                            <b>Email:</b>
                            <p class="mt-2">thietbiytecaocao@gmail.com</p>
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <div class="address-text">
                            <b>Điện thoại:</b>
                            <p class="mt-2">0912.051.299</p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <!--	Latest Product	-->
        <div class="col-lg-8 col-md-12 col-sm-12">
            <form action="" method="POST">
                <div class="form-contact">

                    <div class="col medium-12 noPadding">
                        <h2>Liên hệ</h2>
                    </div>

                    <div class="col medium-6 noPadding">
                        <label for="">Tên
                            <b>*</b>
                        </label>
                        <br>
                        <input required type="text" name="ct_name" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Tên">
                    </div>
                    <div class="col medium-6 noPadding">
                        <label for="">Email
                            <b>*</b>
                        </label>
                        <br>
                        <input required type="text" name="ct_email" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Email">
                    </div>
                    <div class="col medium-6 noPadding">
                        <label for="">Địa chỉ
                        </label>
                        <br>
                        <input required type="text" name="ct_address" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Địa chỉ">
                    </div>
                    <div class="col medium-6 noPadding">
                        <label for="">Số điện thoại
                            <b>*</b>
                        </label>
                        <br>
                        <input required type="text" name="ct_sdt" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Số điện thoại">
                    </div>
                    <div class="col medium-12 noPadding">
                        <label for="">Tiêu đề
                            <b>*</b>
                        </label>
                        <br>
                        <input required type="text" name="ct_title" value="" size="80" aria-invalid="false" placeholder="Tiêu đề">
                    </div>
                    <div class="col medium-12 noPadding">
                        <label for="">Nội dung
                            <b>*</b>
                        </label>
                        <br>
                        <textarea required name="ct_content" cols="40" rows="10" aria-required="true" aria-invalid="false" placeholder="Nội dung"></textarea>
                    </div>
                    <div class="col medium-12 noPadding">
                        <p>
                            <button name="sbm" class="btn btn-danger mt-3" type="submit">Gửi</button>
                        </p>
                    </div>
                                   
                </div>

            </form>
        </div>

    </div>
    <!--	End Latest Product	-->
    


</div>
