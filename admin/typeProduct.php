<?php
include('header.php');
?>
<main>
    <div id="toast"></div>
    <a href="#" class="btn btn-add">
        <i class="fa-solid fa-house-circle-check"></i>
        Thêm mới loại sản phẩm
    </a>
    <div class="modal hide">
        <div class="container" style="max-width: 500px;">
            <div class="modal_header">
                <h2>Model Thêm</h2>
                <i class="fas fa-times"></i>
            </div>
            <form action="#" method="POST" style="min-height: 200px;">
                <!-- Insert Or Update -->
                <?php
                    if (isset($_POST['submit'])) {
                        $typeName = $_POST['typeName'];
                        $sqlInsert = "INSERT INTO tbl_type_product(name, status) VALUES('$typeName', 1)";
                        $resInsert = mysqli_query($connect, $sqlInsert);
                        if ($resInsert == true) {
                            header("Location:index.php");
                        } else {
                            echo $sqlInsert;
                        }

                    }
                ?>
                <div class="form first">
                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field" style="width: 100%;">
                                <label>Tên loại sản phẩm</label>
                                <input type="text" name="typeName" placeholder="Nhập tên" required>
                            </div>
                        </div>
                        <div class="buttons">
                            <input type="submit" name="submit" class="nextBtn btn--success" value="Lưu"></input>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Danh sách loại sản phẩm</h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên loại sản phẩm</th>
                                <th>Tổng sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Cập nhật</th>
                                <th>Xóa</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tbl_type_product entity WHERE entity.status = 1";
                            $result = mysqli_query($connect, $sql);
                            $number = 0;
                            if ($result == TRUE) {
                                $count = mysqli_num_rows($result);
                                if ($count > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $number++;
                                        $id_typeProduct = $row['id'];
                                        $name = $row['name'];
                                        $status = $row['status'];
                                        $sql1 = "SELECT * FROM tbl_product entity WHERE entity.idTypeProduct = $id_typeProduct";
                                        $result1 = mysqli_query($connect, $sql1);
                                        if ($result1 == TRUE) {
                                            $total_product = mysqli_num_rows($result1);
                                        } else {
                                            $total_product = 0;
                                        }

                            ?>
                                        <tr>
                                            <td><?php echo $number; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $total_product; ?></td>
                                            <td>
                                                <?php
                                                if ($status == 1) {
                                                ?>
                                                    <span class="badge success">Đang bán</span>
                                                <?php
                                                }
                                                if ($status == 2) {
                                                ?>
                                                    <span class="badge warning">Đang ngưng bán</span>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="#" class="update-icon">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="update-icon">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                } else {
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    </div>

    <?php
    include('footer.php');
    ?>