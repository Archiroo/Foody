<?php
include('header.php');
?>
<main>
    <a href="#" class="btn btn-add"><i class="fa-solid fa-house-circle-check"></i> Thêm mới loại sản phẩm</a>
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
                            $sql = "SELECT * FROM tbl_type_product entity WHERE entity.status = 1 ORDER BY entity.dateCreate DESC";
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