<!-- jQuery -->
<script src="<?php echo base_url() . 'assets/plugins/jquery/jquery.min.js' ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() . 'assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() . 'assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/dist/js/adminlte.js' ?>"></script>
<!-- Main Quill library -->
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url() . 'assets/plugins/jquery-mousewheel/jquery.mousewheel.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/raphael/raphael.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/jquery-mapael/jquery.mapael.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/jquery-mapael/maps/usa_states.min.js' ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() . 'assets/plugins/chart.js/Chart.min.js' ?>"></script>

<!-- Initialize Quill editor -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{
                    header: [1, 2, 3, 4, 5, 6, false]
                }],
                [{
                    font: []
                }],
                ["bold", "italic"],
                ["link", "blockquote", "code-block", "image"],
                [{
                    list: "ordered"
                }, {
                    list: "bullet"
                }],
                [{
                    script: "sub"
                }, {
                    script: "super"
                }],
                [{
                    color: []
                }, {
                    background: []
                }],
            ]
        },
    });
    quill.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='content']").value = quill.root.innerHTML;
    });
</script>



</body>

</html>