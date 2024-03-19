<h1>Thêm nhà cung cấp</h1>
<form name="nhacungcap-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
    <div class="clear-both"></div>
    <div class="box-content">
    <div class="wrap-field">
        <label>Tên nhà cung cấp: </label>
        <input type="text" name="name" value="" />
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Email: </label>
        <input type="email" name="email" value="" placeholder="VD: lyphuc823@gmail.com"/>
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Website: </label>
        <input type="url" name="website" value="" placeholder="VD: https://www.google.com"/>
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>SĐT: </label>
        <input type="tel" name="sdt" value="" pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" />
        <div class="clear-both"></div>
    </div>
    <input name="btnnccadd" type="submit" title="Lưu nhà cung cấp" value="Lưu" />
    </div>
</form>