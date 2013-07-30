<section class="mini-layout">
    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title">{lang('a_edit')} {lang('a_properties')}: {echo ShopCore::encode($model->getName())}</span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <a href="{$BASE_URL}admin/components/run/shop/properties/index/{echo $filter}" class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span class="t-d_u">{lang('a_back')}</span></a>
                <button type="button" class="btn btn-small btn-primary formSubmit" data-form="#property_ed_form" data-submit><i class="icon-ok icon-white"></i>{lang('a_save')}</button>
                <button type="button" class="btn btn-small  formSubmit" data-form="#property_ed_form" data-action="tomain"><i class="icon-check"></i>{lang('a_save_and_exit')}</button>
                {echo create_language_select($languages, $locale, "/admin/components/run/shop/properties/edit/".$model->getId())}
            </div>
        </div>
    </div>
    <form method="post" action="{$ADMIN_URL}properties/edit/{echo $model->getId()}/{echo $locale}" class="form-horizontal" id="property_ed_form">
        <input type="hidden" name="Locale" value="{echo $locale}"/>
        <div class="tab-content">
            <div class="tab-pane active" id="params">
                <table class="table table-striped table-bordered table-hover table-condensed content_big_td">
                    <thead>
                        <tr>
                            <th colspan="6">
                                {lang('a_param')}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <div class="inside_padd span9">
                                    <div class="control-group m-t_10">
                                        <label class="control-label">{echo $model->getLabel('Name')}:{$translatable}</label>
                                        <div class="controls">
                                            <input type="text" name="Name" value="{echo ShopCore::encode($model->getName())}" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{echo $model->getLabel('CsvName')}:</label>
                                        <div class="controls">
                                            <input type="text" name="CsvName" value="{echo ShopCore::encode($model->getCsvName())}" required/>
                                            <span class="help-inline">{lang('a_lat')}</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-label"></div>
                                        <div class="controls">
                                            <span class="frame_label no_connection">
                                                <span class="niceCheck b_n">
                                                    <input type="checkbox" value="1" name="Active" {if $model->getActive() == 1}checked="checked"{/if}/>
                                                </span>
                                                {echo $model->getLabel('Active')}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-label no_connection"></div>
                                        <div class="controls">
                                            <span class="frame_label">
                                                <span class="niceCheck b_n">
                                                    <input type="checkbox" value="1" name="MainProperty" {if $model->getMainProperty() == true}checked="checked"{/if}/>
                                                </span>
                                                {echo $model->getLabel('MainProperty')}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-label no_connection"></div>
                                        <div class="controls">
                                            <span class="frame_label">
                                                <span class="niceCheck b_n">
                                                    <input type="checkbox" value="1" name="ShowOnSite" {if $model->getShowOnSite() == true}checked="checked"{/if}/>
                                                </span>
                                                {echo $model->getLabel('ShowOnSite')}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-label no_connection"></div>
                                        <div class="controls">
                                            <span class="frame_label">
                                                <span class="niceCheck b_n">
                                                    <input type="checkbox" value="1" name="ShowInCompare" {if $model->getShowInCompare() == true}checked="checked"{/if}/>
                                                </span>
                                                {echo $model->getLabel('ShowInCompare')}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-label no_connection"></div>
                                        <div class="controls">
                                            <span class="frame_label">
                                                <span class="niceCheck b_n">
                                                    <input type="checkbox" value="1" name="ShowInFilter" {if $model->getShowInFilter() == true}checked="checked"{/if}/>
                                                </span>
                                                {echo $model->getLabel('ShowInFilter')}
                                            </span>
                                        </div>
                                    </div>
									
									
                                    <div class="control-group">
                                        <div class="control-label"></div>
                                        <div class="controls">
                                            <span class="frame_label no_connection">
                                                <span class="niceCheck b_n">
                                                    <input type="checkbox" value="1" name="Multiple" {if $model->getMultiple() == true}checked="checked"{/if}/>
                                                </span>
                                                {echo $model->getLabel('Multiple')}
                                            </span>
                                        </div>
                                    </div>
									
									<!-- vir-mir стандартном виде, либо слайдом, либо списко-->
									<div class="control-group">
                                        <div class="control-label"></div>
                                        <div class="controls">
                                            <span class="frame_label no_connection">
                                                <span class="niceRadio b_n">
                                                    <input type="radio" value="slide" name="Variable_property" {if $model->getVariableProperty() == 'slide'}checked="checked"{/if}/>
                                                </span>
                                                {echo $model->getLabel('Slide')}
											</span>
											<span class="frame_label no_connection">
												<span class="niceRadio b_n">
                                                    <input type="radio" value="list" name="Variable_property" {if $model->getVariableProperty() == 'list'}checked="checked"{/if}/>
                                                </span>
                                                {echo $model->getLabel('List')}
											</span>
											<span class="frame_label no_connection">
												<span class="niceRadio b_n">
                                                    <input type="radio" value="def" name="Variable_property" {if $model->getVariableProperty('Def') == 'def'}checked="checked"{/if}/>
                                                </span>
                                                {echo $model->getLabel('Def')}
                                            </span>
                                        </div>
                                    </div>
									
									
                                    <div class="control-group">
                                        <label class="control-label">{echo $model->getLabel('UseInCategories')}:</label>
                                        <div class="controls">
                                            <select name="UseInCategories[]" multiple="multiple">
                                                {foreach $categories as $category}
                                                    {$selected=""}
                                                    {if in_array($category->getId(), $propertyCategories)}
                                                        {$selected="selected='selected'"}
                                                    {/if}
                                                    <option {$selected} value="{echo $category->getId()}">{str_repeat('-',$category->getLevel())} {echo ShopCore::encode($category->getName())}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group m-t_10">
                                        <label class="control-label">FAQ</label>
                                        <div class="controls">
                                            <textarea name="Description">{echo $model->getdescription()}</textarea>
                                        </div>
                                    </div>        
                                    <div class="control-group">
                                        <label class="control-label">{echo $model->getLabel('Data')}:</label>
                                        <div class="controls">
                                            <textarea name="Data">{echo ShopCore::encode($model->asText())}</textarea>  
                                        </div>
                                    </div>        
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {form_csrf()}
    </form>
</section>