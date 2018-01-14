
<script>

    $(document).ready(function(){
        var selectBox = document.getElementById("selectPageBox");
        var pageNumber = selectBox.options[selectBox.selectedIndex].value;
        var category = '{{$data['originalCategory']}}';
        displayPreviousPage(pageNumber);
        displayNextPage(pageNumber);
        changePage(category);

    });

    function onClickPrevious(category){
        var selectBox = document.getElementById("selectPageBox");
        var pageNumber = selectBox.options[selectBox.selectedIndex].value;
        var prevPage = parseInt(pageNumber) - 1;
        executeAjaxPage(prevPage, category);
        $('#selectPageBox').val(prevPage);
        displayPreviousPage(prevPage);
        displayNextPage(prevPage);
    }
    function onClickNext(category){

        var selectBox = document.getElementById("selectPageBox");
        var pageNumber = selectBox.options[selectBox.selectedIndex].value;
        var nextPage = parseInt(pageNumber) + 1;
        executeAjaxPage(nextPage, category);
        $('#selectPageBox').val(nextPage);
        displayPreviousPage(nextPage);
        displayNextPage(nextPage);
    }

    function displayPreviousPage(page){
        if (page==1){
            $("[aria-label=Previous]").css("display", "none");
        }else {
            $("[aria-label=Previous]").css("display", "inline-block");
        }
    }
    function displayNextPage(page){
        var size = Math.ceil(parseInt('{{ $data['size'] }}')/9);
        if (page==size){
            $("[aria-label=Next]").css("display", "none");
        }else {
            $("[aria-label=Next]").css("display", "inline-block");
        }
    }
    function changePage(category){
        var selectBox = document.getElementById("selectPageBox");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var category = category.split('%20')[0];
        displayPreviousPage(selectedValue);
        displayNextPage(selectedValue);
        executeAjaxPage(selectedValue, category);
    }

    function executeAjaxPage(selectedValue, category){
        var url = '{{$url}}';
        var divElement = '{{$divElement}}';
        $.ajax({
            type:'GET',
            url: url+category+'/'+selectedValue,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data){
                $(divElement).html(data.data.cocktails);
                for (i = 0; i < data.data.cocktails.length; i++) {

                    $(divElement).append('<div class="col-sm-4"><div class="thingsBox thinsSpace">' +
                        '<div class="thingsImage"><img src="'+data.data.cocktails[i].strDrinkThumb+'" width="280" height="270"/>' +
                        '<div class="thingsMask"> <a href=../view/'+data.data.cocktails[i].idDrink+' >' +
                        '<h2>'+ data.data.cocktails[i].strDrink+'</h2></a></div> </div> </div> </div>');
                }

            }
        });
    }
</script>