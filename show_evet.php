<!DOCTYPE html>
<html>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>

    <?php
    include "conn.php";
    include "header.php";

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    $userId = "";
    if ($_GET) {
        $userId = $_GET['event_id'];
    }
    $sql = "SELECT event_id, event_name, event_detail, date_start, `image`, status_event, date_end FROM `event` WHERE event_id = '$userId'  ";
    $results = $conn->query($sql);

    $sql2 = "SELECT * FROM applicant WHERE event_id = '$userId'";
    $results2 = $conn->query($sql2);
    // $row3 = $results2->fetch_assoc();
    // print_r($row3);

    // print_r($results->num_rows);
    // echo $result['num_rows'];

    $conn->close();
    ?>
    <div class="row">
        <div class="col-12 ">
            <!-- Button trigger modal -->

        </div>

    </div>
    <div class="row mt-2 ml-2 mr-2">

        <div class="col-6">
            <div class="row mb-2">
                <div class="col-3">
                    <h3> ข้อมูล</h3>
                </div>
            </div>
            <table border="1" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align:center">ID</th>
                        <th style="text-align:center">Name</th>
                        <th style="text-align:center">รายละเอียดการเลือกตั้ง</th>
                        <th style="text-align:center">รูปภาพ</th>
                        <th style="text-align:center">TimeStart</th>
                        <th style="text-align:center">TimeEnd</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $results->fetch_assoc()) {
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo $row["event_id"] ?></td>
                            <td style="text-align:center"><?php echo $row["event_name"] ?></td>
                            <td style="text-align:center"><?php echo $row["event_detail"] ?></td>
                            <td style="text-align:center"><img src="images/<?php echo $row["image"] ?>" alt="" width="100px" height="100px"></td>
                            <td style="text-align:center"><?php echo $row["date_start"] ?></td>
                            <td style="text-align:center"><?php echo $row["date_end"] ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>



        </div>
        <div class="col-6">
            <div class="row mb-2">
                <div class="col-3">
                    <h3>ผู้สมัคร</h3>

                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                        เพิ่ม
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">เพิ่มข้อมูล</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">ชื่อ</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label for="">สกุล</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table border="1" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align:center">NO.</th>
                        <th style="text-align:center">IMG</th>
                        <th style="text-align:center">Name</th>
                        <th style="text-align:center">Edit</th>
                        <th style="text-align:center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row2 = $results2->fetch_assoc()) {
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo $row2["applicant_number"] ?></td>
                            <td style="text-align:center"><img src="images/<?php echo $row2["applicant_image"] ?>" alt="" width="100px" height="100px"></td>
                            <td style="text-align:center"><?php echo $row2["applicant_name"] ?></td>

                            <td style="text-align:center">
                                <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#editModal">
                                    แก้ไข
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:center">
                                <button class="btn btn-danger">
                                    ลบ
                                </button>
                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>



        </div>

    </div>



</body>

</html>