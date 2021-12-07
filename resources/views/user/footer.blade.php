{{-- <footer class="footer text-center" id="footer">
    <div class="container">
      <ul class="list-inline mb-5">
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="">
            <i class="icon-social-facebook"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="">
            <i class="icon-social-twitter"></i>
          </a>
        </li>
      </ul>
      <p class="text-muted small mb-0">Copyright &copy; TentorQ 2019</p>
    </div>
  </footer> --}}

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="user/vendor/jquery/jquery.min.js"></script>
    <script src="user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="user/js/stylish-portfolio.min.js"></script>
	<script src="user/dist/js/adminlte.min.js"></script>
	<script src="user/dist/js/demo.js"></script>
	<script src="user/edustage/js/jquery-3.2.1.min.js"></script>
    <script src="user/edustage/js/popper.js"></script>
    <script src="user/edustage/js/bootstrap.min.js"></script>
	<script src="user/edustage/js/theme.js"></script>
  <script src="admin/dist/js/adminlte.js"></script>
<script src="admin/dist/js/demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.2/dist/sweetalert2.all.min.js"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
  </script>
 