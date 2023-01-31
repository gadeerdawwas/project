
  <div class="footer bg-black text-white text-sm items-center text-center py-8">
      <ul class="md:flex md:items-center w-1/3 text-xs mx-auto mb-9 justify-between">
        <li><a href="#">سياسة الخصوصية</a></li>
        <li><a href="#">الشروط والاحكام</a></li>
        <li><a href="#">اتصل بنا</a></li>
        <li><a href="#">الشكاوى</a></li>
      </ul>
      <p class="text-sm text-slate-400"> &reg;&trade; {{date('Y')}} جميع الحقوق محفوظة</p>
  </div>

  <script>
    function Menu(e) {
      let list = document.querySelector('ul');
      e.name === 'menu' ? (e.name = "close", list.classList.add('top-[80px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[80px]'), list.classList.remove('opacity-100'))
    }
  </script>


</body>
</html>