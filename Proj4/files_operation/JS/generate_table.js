/**
 * Created by drapek on 12.12.15.
 */
var row_counter = 1;
addNewRowToTable(); //wykonanie raz funkcji by tabela na stronie nie była pusta

function addNewRowToTable() {
    var table = document.getElementById('file_upload');
    var row = table.insertRow();
    var cell_lp = row.insertCell(0);
    var cell_comment = row.insertCell(1);
    var cell_file_button = row.insertCell(2);

    cell_lp.innerHTML = row_counter;


    cell_comment.innerHTML = "<input type=\"text\" name=\"comment_"+row_counter+"\" class=\"input_comment\" id=\"input_comment_"+row_counter+"\" />"

    cell_file_button.innerHTML = "<input class=\"input_file\" type=\"file\" name=\"file_"+row_counter+"\" />";

    row_counter++;
}