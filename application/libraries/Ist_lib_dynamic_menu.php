<?php
/**
 * @Author: ramadhansutejo
 * @Date:   2016-06-25 11:17:58
 * @Last Modified by:   ramadhansutejo
 * @Last Modified time: 2016-07-28 11:16:59
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Ist_lib_dynamic_menu
{
	/**
	 * Baris kode yang bisa diubah sesuai kebutuhan.
	 * config html tag.
	 */
	/*main ul li tag, sesuaikan dengan template*/
	private $ul_tag_open1 = '<ul';
	private $ul_tag_open2 = '>';
	private $ul_tag_close = '</ul>';
	private $li_tag_open1 = '<li';
	private $li_tag_open2 = '>';
	private $li_tag_close = '</li>';

	/*class atribut, sesuai dengan class template*/
	private $main_ul_class = ' class="navigation navigation-main navigation-accordion"';
	private $parent_li_class = '';
	private $noparent_li_class = '';
	private $child_ul_class = '';

	/*link dan icon atribut, sesuaikan dengan template*/
	private $link_atr_open1 = '<a href="';
	private $link_atr_open2 = '">';
	private $link_atr_close = '</a>';
	private $icon_atr1 = '<i class="';
	private $icon_atr2 = '"></i>';
	//private $span_right_atr = '<span class="fa arrow"></span>';	

	/*menu caption/judul atribut, sesuaikan dengan template*/
	private $caption_atr1 = '<span> ';
	private $caption_atr2 = ' </span>';

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->model('dynamic_menu/menu_model');
        $this->ci->load->helper('array');
	}

	public function create_menu($url_class, $url_method)
	{
		$menuData = $this->ci->menu_model->select_parent_menu();

		/*main ul, be like <ul>*/
		$html_render = $this->ul_tag_open1.$this->main_ul_class.$this->ul_tag_open2;

		foreach ($menuData as $menu_item)
		{
			/*-------------------menu aktif parent--------------------*/
			if ($url_class == $menu_item->url) 
			{
				$noparent_li_class_aktif = ' class="active"';
				$parent_li_class_aktif = '';
			} 
			else 
			{
				$noparent_li_class_aktif = '';
				$parent_li_class_aktif = '';
			}
			/*-------------------------------------------------*/

			if ($menu_item->is_parent != 'Y')
			{
				/*start dynamic list, be like <li>*/
				$html_render .= "\n\t".$this->li_tag_open1.$this->noparent_li_class.$noparent_li_class_aktif.$this->li_tag_open2;
				/*menu atribut, be like <a href bla...*/
				$html_render .= "\n\t\t".$this->link_atr_open1.base_url(''.$menu_item->url).$this->link_atr_open2.$this->icon_atr1.$menu_item->icon.$this->icon_atr2.$this->caption_atr1.$menu_item->judul.$this->caption_atr2.$this->link_atr_close;
				/*close li tag*/
				$html_render .= "\n\t".$this->li_tag_close;
			} 
			else 
			{
				/*start dynamic list, be like <il>*/
				$html_render .= "\n\t".$this->li_tag_open1.$this->parent_li_class.$parent_li_class_aktif.$this->li_tag_open2;
				/*menu atribut, be like <a href bla...*/
				$html_render .= "\n\t\t".$this->link_atr_open1.$menu_item->url.$this->link_atr_open2.$this->icon_atr1.$menu_item->icon.$this->icon_atr2.$this->caption_atr1.$menu_item->judul.$this->caption_atr2.$this->link_atr_close;				
				/*child menu list, be like <li><ul><li></li></ul></li>*/
				$html_render .= "\n\t\t".$this->ul_tag_open1.$this->child_ul_class.$this->ul_tag_open2;

				$menuChildData = $this->ci->menu_model->select_child_menu($menu_item->id_menu);
				foreach ($menuChildData as $menu_child_item) 
				{
					/*penambahan url segment method, tgl 28-07-2016*/
					$method_uri = explode('/', $menu_child_item->url);
					/*-------------------menu aktif child--------------------*/
					if ($url_method == $method_uri[1]) 
					{
						$noparent_li_class_aktif_child = ' class="active"';
						$parent_li_class_aktif_child = '';
					} 
					else 
					{
						$noparent_li_class_aktif_child = '';
						$parent_li_class_aktif_child = '';
					}
					/*-------------------------------------------------*/

					if ($menu_child_item->is_parent != 'Y') 
					{
						/*list of child menu, be like <li>*/
						$html_render .= "\n\t\t\t".$this->li_tag_open1.$this->noparent_li_class.$noparent_li_class_aktif_child.$this->li_tag_open2;
						/*link & icon atr child menu, be like <a href=bla....*/
						$html_render .= $this->link_atr_open1.base_url(''.$menu_child_item->url.'/').$this->link_atr_open2.$menu_child_item->judul.$this->link_atr_close.$this->li_tag_close;
					} 
					else 
					{
						/*list of child menu, be like <li>*/
						$html_render .= "\n\t\t\t".$this->li_tag_open1.$this->parent_li_class.$parent_li_class_aktif_child.$this->li_tag_open2;
						/*link & icon atr child menu, be like <a href=bla....*/
						$html_render .= "\n\t\t\t\t".$this->link_atr_open1.base_url(''.$menu_child_item->url.'/').$this->link_atr_open2.$this->caption_atr1.$menu_child_item->judul.$this->caption_atr2.$this->link_atr_close;
						/*list child from child menu, be like dalam menu ada menu ada menu lagi hhehe*/
						$html_render .= "\n\t\t\t\t".$this->ul_tag_open1.$this->child_ul_class.$this->ul_tag_open2;

						$menuChildChildData = $this->ci->menu_model->select_child_menu($menu_child_item->id_menu);
						foreach ($menuChildChildData as $menu_child_child_item) 
						{
							/*link & icon atr child menu, be like <a href=bla....*/
							$html_render .= "\n\t\t\t\t\t".$this->link_atr_open1.$menu_child_child_item->url.$this->link_atr_open2.$menu_child_child_item->judul.$this->link_atr_close.$this->li_tag_close;
						}

						$html_render .= "\n\t\t\t\t".$this->ul_tag_close;

						$html_render .= "\n\t\t\t".$this->li_tag_close;
					}
				}
				
				$html_render .= "\n\t\t".$this->ul_tag_close;
				/*close li tag*/
				$html_render .= "\n\t".$this->li_tag_close;
			}
		}

		$html_render .= "\n".$this->ul_tag_close;

		return $html_render;
	}

}

/* End of file Ist_lib_dynamic_menu.php */
/* Location: ./application/libraries/Ist_lib_dynamic_menu.php */
