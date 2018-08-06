
$(document).ready(function () {
    $('#datatable1').DataTable({
        "ordering": false,
        "info":     false,
    });
    $('#tableper').DataTable({
        "ordering": false,
        "info":     false,
    });
     $('#tableppn').DataTable({
        "ordering": false,
        "info":     false
    });
      $('#tablenonppn').DataTable({
        "ordering": false,
        "info":     false
    });
      jQuery('#tgl_invoice').datepicker({
            format : 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
      });
      jQuery('#tgl_t_pembayaran').datepicker({
            format : 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
      });

        var itemCountprep = 0; 
        var itemCount = 0; 
      //table append
      function addRow() {
        var item_count = $("#item_area tr").length + 1;

        var item = '<tr><td><select class="form-control" name="item[' + item_count + ']" ><option value="">Selsect Item</option>';         
            item += '<option value="1">HP Z220</option><option value="2">Samsung S6</option><option value="3">Nikon D700</option>';
            item += '</select></td>';
            item += '<td ><input class="form-control" type="text" name="unit_price[' + item_count + ']" placeholder="Unit Price"/></td>';
            item += '<td ><input class="form-control" type="text" name="quantity[' + item_count + ']" placeholder="Quantity"/></td>';
            item += '<td ><input class="form-control" type="text" name="alrt_quantity[' + item_count + ']" placeholder="Aler Quantity"/></td>';
            item += '</tr>';
            $('#item_area').append(item);
        }
      $('#add').on("click", function(){
        

        html += '<td><input type="text" class="form-control" name="no"/></td>';
        html += '<td><input type="text" class="form-control" name="nama_project' + counter + '"/></td>';
        html += '<td><input type="text" class="form-control" name="qty' + counter + '"/></td>';
        html += '<td><input type="text" class="form-control" name="unit' + counter + '"/></td>';
        html += '<td><input type="text" class="form-control" name="price' + counter + '"/></td>';
        html += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';

        html += '<td><input type="button" class="ibtnDel btn btn-danger btn-sm "  value="Delete"></td>';
        newRow.append(html);
        $("table.invppn").append(newRow);
        counter++;
      });
      $("table.invppn").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            counter -= 1
      });
});