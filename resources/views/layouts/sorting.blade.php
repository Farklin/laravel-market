  <div class="product-sorting d-flex">
      <p>Сортировать по:</p>
      <form action="" method="get">
          <select name="sort" id="sortByselect">
              <option value="new">Новинки</option>
              <option value="upname">от А-Я</option>
              <option value="downname">от Я-Адрес</option>
              <option value="upprice">Цена: $$ - $</option>
              <option value="downprice">Цена: $ - $$</option>
          </select>
          <input id="btn-sort" type="submit" class="d-none" value="">
      </form>
      <script type="text/javascript">
          $("#sortByselect").change(function() {
              $("#btn-sort").click();
          });
      </script>
  </div>
