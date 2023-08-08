<!-- HuyDev -->
<!-- BEGIN: Dark Mode Switcher-->
<div data-url="#" id="huydev" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 left-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 ml-20" style="margin-left:50px">
  <div class="mr-4 text-slate-600 dark:text-slate-200">Quốc Huy</div>
  <div class="dark-mode-switcher__toggle  border"></div>
</div>
// <script type="text/javascript">
//   $(document).ready(function() {
//     setInterval(function() {
//       let alertDisplayed = false;
//       $.ajax({
//         type: "GET",
//         url: "<?= BASE_URL("/assets/ajaxs/AlertBank.php"); ?>",
//         dataType: "json",
//         success: function(data) {
//           if (data) {
//             Swal.fire("Thành Công", `Nạp Tiền Thành Công Với ${data.money}`, "success");
//             alertDisplayed = true
//           } else {
//             console.log("Lê Quốc Huy")
//           }
//         }
//       });
//     }, 5000)
//     $("#huydev").click(function() {
//       $("html").toggleClass("dark")
//     })
//   });
// </script>
<script type="text/javascript">
  window.$crisp = [];
  window.CRISP_WEBSITE_ID = "6e6251f7-adab-44bc-90d7-9732cfe06804";
  (function() {
    d = document;
    s = d.createElement("script");
    s.src = "https://client.crisp.chat/l.js";
    s.async = 1;
    d.getElementsByTagName("head")[0].appendChild(s);
  })();
</script>
<script src="<?= BASE_URL('') ?>/template/js/app.js"></script>
<script src="<?= BASE_URL('') ?>/template/js/huydev.js"></script>
<script src="<?= BASE_URL('') ?>/template/dist/js/toastr.min.js"></script>
</body>

</html>