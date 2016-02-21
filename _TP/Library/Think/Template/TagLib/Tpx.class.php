<?php
namespace Think\Template\TagLib;

use Think\Template\TagLib;

/**
 * Tpx标签库驱动
 */
class Tpx extends TagLib
{
    // 标签定义
    protected $tags = array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'input_text' => array('attr' => 'id,title,desc,required,readonly', 'close' => 1),
        'input_number' => array('attr' => 'id,title,desc,required,readonly', 'close' => 1),
        'input_richtext' => array('attr' => 'id,title,desc,required,readonly', 'close' => 1),
        'input_bigtext' => array('attr' => 'id,title,desc,required,readonly', 'close' => 1),
        'input_imagefile' => array('attr' => 'id,title,desc,extension', 'close' => 1),
        'input_datetime' => array('attr' => 'id,title,desc,required,readonly', 'close' => 1),
        'input_date' => array('attr' => 'id,title,desc,required,readonly', 'close' => 1),
        'input_selectnumber' => array('attr' => 'id,title,desc,required,readonly,option,current', 'close' => 1),
        'input_selecttext' => array('attr' => 'id,title,desc,required,readonly,option,current', 'close' => 1),
        'input_submit' => array('attr' => '', 'close' => 1)
    );

    //所有标签
    // <input_text id="" title="" desc="" required="1" readonly="0">{$data}</input_text>
    // <input_richtext id="" title="" desc="" required="1" readonly="0">{$data_contact_detail}</input_richtext>
    // <input_bigtext id="home_description" title="首页描述" desc="" required="1" readonly="0">{$data_home_description}</input_bigtext>
    // <input_submit></input_submit>
    // ...

    public function _input_selectnumber($tag, $content)
    {
        return $this->_input_selecttext($tag, $content);
    }

    public function _input_selecttext($tag, $content)
    {
        $id = isset($tag['id']) ? $tag['id'] : '[ID]';
        $title = isset($tag['title']) ? $tag['title'] : '[Title]';
        $desc = isset($tag['desc']) ? $tag['desc'] : '';
        $readonly = (isset($tag['readonly']) && intval($tag['readonly'])) ? true : false;
        $required = (isset($tag['required']) && intval($tag['required'])) ? true : false;
        $option = isset($tag['option']) ? $tag['option'] : '';
        $current = isset($tag['current']) ? $tag['current'] : '';

        return '<div class="form-group">
                    <label class="col-sm-2 control-label">' . htmlspecialchars($title) . '</label>
                    <div class="col-sm-9">
                        <select name="' . $id . '" class="form-control" style="width:auto;" ' . ($readonly ? 'readonly="readonly"' : '') . ' ' . ($required ? 'required="required"' : '') . '>
                            ' . ($option ? '
                            <?php foreach(' . $option . ' as $__k__=>$__v__){
                                if(' . $current . '==$__k__){
                                    echo \'<option value="\'.$__k__.\'" selected="selected">\'.htmlspecialchars($__v__).\'</option>\';
                                }else{
                                    echo \'<option value="\'.$__k__.\'">\'.htmlspecialchars($__v__).\'</option>\';
                                }
                             } ?>
                            ' : '') . '
                        </select>
                        <div class="help-block">' . htmlspecialchars($desc) . '</div>
                    </div>
                </div>';
    }

    public function _input_date($tag, $content)
    {
        $id = isset($tag['id']) ? $tag['id'] : '[ID]';
        $title = isset($tag['title']) ? $tag['title'] : '[Title]';
        $desc = isset($tag['desc']) ? $tag['desc'] : '';
        $readonly = (isset($tag['readonly']) && intval($tag['readonly'])) ? true : false;
        $required = (isset($tag['required']) && intval($tag['required'])) ? true : false;
        return '<div class="form-group">
                    <label class="col-sm-2 control-label">' . htmlspecialchars($title) . '</label>
                    <div class="col-sm-9">
                        <input name="' . $id . '" type="text" class="form-control" placeholder="" value="' . $content . '" style="width:auto;" ' . ($readonly ? 'readonly="readonly"' : '') . ' ' . ($required ? 'required="required"' : '') . ' />
                        <script type="text/javascript">
                            require(["jquery.extern"],function(){
                                $.includeCSS("jquery-ui-1.11.2/jquery-ui-timepicker-addon");
                            });
                            require(["jquery.ui.timepicker"],function(){
                                $( "input[name=' . $id . ']" ).datetimepicker({
                                    dateFormat:"yy-mm-dd",
                                    timeFormat:""
                                });
                            });
                        </script>
                        <div class="help-block">' . htmlspecialchars($desc) . '</div>
                    </div>
                </div>';
    }

    public function _input_datetime($tag, $content)
    {
        $id = isset($tag['id']) ? $tag['id'] : '[ID]';
        $title = isset($tag['title']) ? $tag['title'] : '[Title]';
        $desc = isset($tag['desc']) ? $tag['desc'] : '';
        $readonly = (isset($tag['readonly']) && intval($tag['readonly'])) ? true : false;
        $required = (isset($tag['required']) && intval($tag['required'])) ? true : false;
        return '<div class="form-group">
                    <label class="col-sm-2 control-label">' . htmlspecialchars($title) . '</label>
                    <div class="col-sm-9">
                        <input name="' . $id . '" type="text" class="form-control" placeholder="" value="' . $content . '" style="width:auto;" ' . ($readonly ? 'readonly="readonly"' : '') . ' ' . ($required ? 'required="required"' : '') . ' />
                        <script type="text/javascript">
                            require(["jquery.extern"],function(){
                                $.includeCSS("jquery-ui-1.11.2/jquery-ui-timepicker-addon");
                            });
                            require(["jquery.ui.timepicker"],function(){
                                $( "input[name=' . $id . ']" ).datetimepicker({
                                    dateFormat:"yy-mm-dd",
                                    timeFormat:"HH:mm:ss"
                                });
                            });
                        </script>
                        <div class="help-block">' . htmlspecialchars($desc) . '</div>
                    </div>
                </div>';
    }

    public function _input_imagefile($tag, $content)
    {

        $id = isset($tag['id']) ? $tag['id'] : '[ID]';
        $title = isset($tag['title']) ? $tag['title'] : '[Title]';
        $desc = isset($tag['desc']) ? $tag['desc'] : '';
        $extension = isset($tag['extension']) ? $tag['extension'] : '';

        $imagefile_id = 'imagefile_' . mt_rand(100000, 999999);

        return '<div class="form-group">
                    <label class="col-sm-2 control-label">' . htmlspecialchars($title) . '</label>
                    <div class="col-sm-9">
                        <table border="0" style="table-layout:fixed">
                            <tr>
                                <td>
                                    <span style="display:inline-block;padding:3px;border:1px solid #CCC;">
                                        <img src="' . $content . '" id="' . $id . '-preview" style="height:150px;min-width:50px;max-width:400px;" />
                                    </span>
                                </td>
                                <td width="20">
                                    <input type="hidden" name="' . $id . '" id="' . $id . '" value="' . htmlspecialchars($content) . '" />
                                </td>
                                <td width="120">
                                    <div id="' . $imagefile_id . '"></div>
                                </td>
                            </tr>
                        </table>
                        <script type="text/javascript">
                            require(["upload_button"],function(){
                                $("#' . $imagefile_id . '").UploadButton({
                                    value_holder   : "#' . $id . '",
                                    preview_holder : "#' . $id . '-preview",
                                    width 	    : 24,
                                    height 	    : 24,
                                    postURL     : "' . U('System/uploadhandle?action=uploadbutton&type=image') . '",
                                    background  : "http://' . $_SERVER['SERVER_NAME'] . __ROOT__ . '/asserts/upload_button/upload_24x24.png",
                                    acceptExt   : "' . $extension . '",
                                    showLoading : true,
                                    showAlert   : false
                                });
                            });
                        </script>
                        <div class="help-block">' . htmlspecialchars($desc) . '</div>
                    </div>
                </div>';
    }

    public function _input_bigtext($tag, $content)
    {
        $id = isset($tag['id']) ? $tag['id'] : '[ID]';
        $title = isset($tag['title']) ? $tag['title'] : '[Title]';
        $desc = isset($tag['desc']) ? $tag['desc'] : '';
        $readonly = (isset($tag['readonly']) && intval($tag['readonly'])) ? true : false;
        $required = (isset($tag['required']) && intval($tag['required'])) ? true : false;

        return '<div class="form-group">
                    <label class="col-sm-2 control-label">' . $title . '</label>
                    <div class="col-sm-9">
                        <textarea name="' . $id . '" class="form-control" style="min-height:6em;" placeholder="" ' . ($readonly ? 'readonly="readonly"' : '') . ' ' . ($required ? 'required="required"' : '') . '>' . htmlspecialchars($content) . '</textarea>
                        <div class="help-block">' . htmlspecialchars($desc) . '</div>
                    </div>
                </div>';
    }

    public function _input_submit($tag, $content)
    {
        $submit = empty($content) ? L('submit') : $content;
        return '<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">' . htmlspecialchars($submit) . '</button>
            </div>
        </div>';
    }

    public function _input_text($tag, $content)
    {
        $id = isset($tag['id']) ? $tag['id'] : '[ID]';
        $title = isset($tag['title']) ? $tag['title'] : '[Title]';
        $desc = isset($tag['desc']) ? $tag['desc'] : '';
        $readonly = (isset($tag['readonly']) && intval($tag['readonly'])) ? true : false;
        $required = (isset($tag['required']) && intval($tag['required'])) ? true : false;

        return '<div class="form-group">
            <label class="col-sm-2 control-label">' . $title . '</label>
            <div class="col-sm-9">
                <input name="' . $id . '" type="text" class="form-control" placeholder="" value="' . htmlspecialchars($content) . '" ' . ($readonly ? 'readonly="readonly"' : '') . ' ' . ($required ? 'required="required"' : '') . ' />
                <div class="help-block">' . htmlspecialchars($desc) . '</div>
            </div>
        </div>';
    }

    public function _input_number($tag, $content)
    {
        $id = isset($tag['id']) ? $tag['id'] : '[ID]';
        $title = isset($tag['title']) ? $tag['title'] : '[Title]';
        $desc = isset($tag['desc']) ? $tag['desc'] : '';
        $readonly = (isset($tag['readonly']) && intval($tag['readonly'])) ? true : false;
        $required = (isset($tag['required']) && intval($tag['required'])) ? true : false;

        return '<div class="form-group">
            <label class="col-sm-2 control-label">' . $title . '</label>
            <div class="col-sm-9">
                <input name="' . $id . '" type="text" class="form-control" placeholder="" value="' . htmlspecialchars($content) . '" ' . ($readonly ? 'readonly="readonly"' : '') . ' ' . ($required ? 'required="required"' : '') . ' style="width:auto;" />
                <div class="help-block">' . htmlspecialchars($desc) . '</div>
            </div>
        </div>';
    }

    public function _input_richtext($tag, $content)
    {
        $id = isset($tag['id']) ? $tag['id'] : '[ID]';
        $title = isset($tag['title']) ? $tag['title'] : '[Title]';
        $desc = isset($tag['desc']) ? $tag['desc'] : '';
        $readonly = (isset($tag['readonly']) && intval($tag['readonly'])) ? true : false;
        $required = (isset($tag['required']) && intval($tag['required'])) ? true : false;

        return '<div class="form-group">
                    <label class="col-sm-2 control-label">' . htmlspecialchars($title) . '</label>
                    <div class="col-sm-9">
                        <script id="' . $id . '" name="' . $id . '" type="text/plain">
                            ' . htmlspecialchars($content) . '
                        </script>
                        <script type="text/javascript">
                            require(["ueditor"],function(){
                                var ue = UE.getEditor("' . $id . '") ;
                                if(TPX.UEDITOR){
                                    TPX.UEDITOR.push(ue);
                                }
                            });
                        </script>
                        <div class="help-block">' . htmlspecialchars($desc) . '</div>
                    </div>
                </div>';
    }
}