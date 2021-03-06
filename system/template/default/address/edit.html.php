{*
/**
 * The create view of address module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV12 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     address 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
*}
<form class='editForm' action='{!inlink('edit', "id=$address->id")}' method='post'>
  <table class='table table-borderless address-form table-list'>
    <tr>
      <td class='w-100px'>{!html::input('contact', $address->contact, "class='form-control' placeholder='{{$lang->address->contact}}'")}</td>
      <td class='w-130px'>{!html::input('phone', $address->phone, "class='form-control' placeholder='{{$lang->address->phone}}'")}</td>
      <td>{!html::input('address', $address->address, "class='form-control' placeholder='{{$lang->address->address}}'")}</td>
      <td class='w-100px'>{!html::input('zipcode', $address->zipcode, "class='form-control' placeholder='{{$lang->address->zipcode}}'")}</td>
      <td class='w-80px text-middle'>
        {!html::a('javascript:;', $lang->save, "class='submit'")}
        {!html::a('javascript:;', $lang->cancel, "class='cancelEdit'")}
      </td>
    </tr>
  </table>
</form>

