require('./bootstrap');


$(document).ready(function(){
    $(document).on("change", ".categories", function(){
        var _this = $(this);
        var parent = _this.val();
        var get_attr = _this.data("content");
        var random = Math.floor(Math.random() * 1000);
        var text = _this.children("option:selected").text();
        var _token = $("meta[name='csrf-token']").attr("content");
        
        if(parent != "na") {
            $(".alert").text("");

            $.ajax({
                url: 'get-sub-category',
                type: 'POST',
                data: {'parent': parent, '_token': _token},
                
                success: function(data){
                    if(data.length == 0){
                        $(".alert").html("<span>`" + text + "`</span> Does not have sub categories");
                        _this.hasClass("sub-category") ? $(".cat" + get_attr).remove() : $(".sub-cat").text("");
                    }
                    else{
                        var options = "";

                        data.forEach(element => {
                            options += "<option value='" + element.id + "'>" + element.title + "</option>";
                        });
                        
                        var subtitle = '<h2 class="text-center"><span>`' + text + '`</span> sub categories</h2>';
                        
                        var content = "<div class='pt-2 content text-center cat" + get_attr + "'>" + subtitle 
                                    + "<select class='m-2 categories sub-category' data-content='" + random + "'><option value='na' disabled selected>Select sub category</option>" 
                                    + options + "</select></div>";

                        _this.hasClass("sub-category") ? $(".sub-cat").append(content) : $(".sub-cat").html(content);                                    
                    }
                }
            });
        }
    });
});