<!DOCTYPE html>
<html lang="en">

<!-- Import head.php from layout folder -->
<?= $this->include('frontend/layout/head'); ?>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Student Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../teacher/home">Subject Table</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

    <!-- Table -->
    <div class="container my-5">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal_subject">
      Add Student
    </button>
    <div class="py-5 table-responsive">
      <table id="myTable" class="table table-hover table-borderless">
        <thead>
          <tr>
            <th>ID</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Grade</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- End Table -->

  </div>
  <!-- Toast Notification -->
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header  bg-success">
        <img src="<?= base_url('assets/img/bell.png') ?>" class="rounded me-2" height="20" width="20" alt="...">
        <strong class="me-auto text-white">Successfull</strong>
        <small><i class="fa fa-users"></i></small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        New Student Added
      </div>
    </div>
  </div>

  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="delete_toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header  bg-danger">
        <img src="<?= base_url('assets/img/bell.png') ?>" class="rounded me-2" height="20" width="20" alt="...">
        <strong class="me-auto text-white">Delete</strong>
        <small><i class="fa fa-users"></i></small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Student removed.
      </div>
    </div>
  </div>

  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="update_toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header  bg-info">
        <img src="<?= base_url('assets/img/bell.png') ?>" class="rounded me-2" height="20" width="20" alt="...">
        <strong class="me-auto text-white">Updated</strong>
        <small><i class="fa fa-users"></i></small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Student updated
      </div>
    </div>
  </div>
  <!-- End of Toast Notification -->

  <!-- Modal Add -->
  <div class="modal fade" id="add_modal_subject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" id="frmstudent">
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" name="student_id" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Student ID</label>
              <div class="text-danger" id="error_student_id"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" name="name" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Name</label>
              <div class="text-danger" id="error_name"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" name="grade" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Grade</label>
              <div class="text-danger" id="error_grade"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary create">Create</button>

          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal Add -->

  <!-- Modal Update -->
  <div class="modal fade" id="edit_modal_student" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" id="frmstudentedit">
          <div class="modal-body">
            <input type="hidden" name="edit_id" id="edit_id">
            <div class="form-floating mb-3">
              <input type="text" name="student_id" class="form-control" id="edit_student_id" placeholder="name@example.com">
              <label for="floatingInput">Student ID</label>
              <div class="text-danger" id="error_student_id"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" name="name" class="form-control" id="edit_name" placeholder="Password">
              <label for="floatingPassword">Name</label>
              <div class="text-danger" id="error_name"></div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" name="grade" class="form-control" id="edit_grade" placeholder="Password">
              <label for="floatingPassword">Grade</label>
              <div class="text-danger" id="error_grade"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary update" data-bs-dismiss="modal">Save Changes</button>

          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal Update -->

  <!-- Delete Modal -->
  <div class="modal fade" id="delete_modal_student" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">Delete Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="display-6">Are you sure you want to delete?</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-danger confirm_delete" data-bs-dismiss="modal">Yes</button>

        </div>
      </div>

    </div>
  </div>
  <!-- End Delete Modal -->
</body>

<!-- Import script.php from layout folder -->
<?= $this->include('frontend/layout/script') ?>

<!-- Internal Javascript codes -->
<script>
  $(document).ready(function() {
    $("#frmstudent").on("submit", function(e) {
      e.preventDefault();
      let a = $(this).serialize();
      $.ajax({
        url: "<?= site_url('student/add') ?>",
        type: "POST",
        data: a,
        dataType: "json",
        success: function(data) {
          if (data.error == 1) {
            $('#frmstudent')[0].reset();
            $("#liveToast").fadeIn();
            $("#myTable").DataTable().ajax.reload();
            setTimeout(function() {
              $("#liveToast").fadeOut();
            }, 3000)
          } else if (data.error == 0) {
            $("#error_student_id").text(data.error_student_id);
            $("#error_name").text(data.error_name);
            $("error_grade").text(data.error_grade);
          }
        }
      })
    })

    studentTable();

  })

  function studentTable() {
    $('#myTable').DataTable({
      "aoColumnDefs": [{
        "bSortable": true,
        "aTargets": [0, 1, 2],
      }],

      "order": [],
      "serverSide": true,
      "searching": true,
      "lengthChange": true,
      "ajax": {
        url: "<?= base_url('student/view') ?>",
        type: 'POST'
      }
    });
  }
</script>

<script>
  $(document).on("click", ".edit", function() {
    let a = $(this).data('id');
    rowid(a);
  })

  let row;

  function rowid(row) {
    $.ajax({
      url: "<?= site_url('student/view/row') ?>",
      type: "post",
      data: {
        id: row
      },
      dataType: "json",
      success: function(data) {
        $("#edit_id").val(data.id);
        $("#edit_modal_student").modal("show")
        $("#edit_student_id").val(data.student_id);
        $("#edit_name").val(data.name);
        $("#edit_grade").val(data.grade);

      }
    })
  }
</script>

<script>
  $(document).ready(function() {
    $("#frmstudentedit").submit(function(e) {
      e.preventDefault()
      let a = $(this).serialize();
      update_data(a)
    })
  })

  let upd;

  function update_data(upd) {
    $.ajax({
      url: "<?= site_url('student/update') ?>",
      type: "post",
      data: upd,
      dataType: "json",
      success: function(data) {
        if (data.status == 1) {
          $("#update_toast").fadeIn();
          $("#myTable").DataTable().ajax.reload();
          setTimeout(function() {
            $("#update_toast").fadeOut();
          }, 3000)
        } else {
          alert("Something wrong")
        }
      }
    })
  }
</script>

<script>
  $(document).on("click", ".delete", function() {
    $("#delete_modal_student").modal("show")
    let id = $(this).data('id');
    let del = $(".confirm_delete").click(function() {
      deleteId(id)
    })
  });

  let rowD;

  function deleteId(rowD) {
    $.ajax({
      url: "<?= site_url('student/delete') ?>",
      type: "post",
      data: {
        id: rowD
      },
      dataType: "json",
      success: function(data) {
        if (data.status == 1) {
          $("#delete_toast").fadeIn();
          $("#myTable").DataTable().ajax.reload();
          setTimeout(function() {
            $("#delete_toast").fadeOut();
          }, 3000)
        } else {
          alert("something wrong");
        }
      }
    })
  }  
</script>

</html>