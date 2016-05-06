<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="../_lib/jquery.js"></script>
        <script type="text/javascript" src="../jquery.jstree.js"></script>
    </head>
    <body>
        <div id="demo" class="demo">
        </div>
        <script type="text/javascript">
$(function () {
             $("#demo").jstree({
                                "json_data" : {
                                                "data" :<?php echo '[{"attr":{"id":"1","rel":"folder"},"data":"ROOT","state":"close","children":[{"attr":{"id":"2","rel":"folder"},"data":"C:","state":"close","children":[{"attr":{"id":"3","rel":"folder"},"data":"_demo","state":"close","children":[{"attr":{"id":"4","rel":"folder"},"data":"demo.html","state":"close"},{"attr":{"id":"14","rel":"folder"},"data":"zmei.html","state":"close"}]},{"attr":{"id":"5","rel":"folder"},"data":"_docs","state":"close","children":[{"attr":{"id":"12","rel":"folder"},"data":"zmei.html","state":"close"}]}]},{"attr":{"id":"6","rel":"folder"},"data":"D:","state":"close","children":[{"attr":{"id":"15","rel":"folder"},"data":"Contabilidad 2","state":"close"}]}]}]'?>												
                                                },
                                "plugins" : [ "themes", "json_data","checkbox","types","ui" ],
                                "types" : {
                                            "types" : {
                                                "default" : {
                                                    "valid_children" : "none",
                                                    "icon" : {
                                                            "image" : "./file.png"
                                                    }
                                                }
                                            },
                                            "folder" : {
						// can have files and other folders inside of it, but NOT `drive` nodes
						"valid_children" : [ "default", "folder" ],
						"icon" : {
							"image" : "./folder.png"
						}
                                            }
                                        },
                                "ui" : {
                                    "initially_select" : [ 23,26 ]
                                }
                });
});

function ver(){
    
   // $("#demo").jstree("get_checked",null,true).each(function () { 
   //     alert(this.id); 
   // });
    var ids='';
    jQuery('#demo').find('.jstree-checked, .jstree-undetermined').each(function () {
        var node = jQuery(this);
        var id = node.attr('id');
        ids += id+',';
       
    });
    alert("elementos:"+ids);   
}

function select(){
    $("#demo").jstree().initially_select([28]);
}

        </script>
        <button onclick="ver()">ver</button>
        <button onclick="select()">ver</button>
    </body>
</html>
