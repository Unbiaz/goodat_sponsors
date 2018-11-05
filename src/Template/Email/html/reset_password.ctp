<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Router;

?>

<table cellspacing="0" cellpadding="0" style="width: 100%; background-color:#FFF; color: #999999;">
   <tbody>
      <tr>
      	<td align="center">
      		<!-- Header top info -->
      		<table cellspacing="0" cellpadding="0" style="width: 100%; padding: 10px 0;">
      		   <tbody>
      		      <tr>
      		         <td align="center">
      		            <p style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; text-decoration: underline; color: #999999 !important;">You receive this message because you are registered on sponsors.goodat.co.uk</p>
      		         </td>
      		      </tr>
      		   </tbody>
      		</table>
      		<!-- End header top info -->
      		<!-- Main content -->
      		<table cellspacing="0" cellpadding="0" border="0" style="background-color: #FFF; margin: auto; padding-bottom: 30px; width: 420px;" class="w100">
      		   <tbody>
      		      <tr>
      		         <td align="center" style="background-color: #f4f4f4; padding: 50px 10px 50px 10px;">
      		            <table cellspacing="0" cellpadding="0" border="0" style="width: 90%;" class="w100">
      		               <tbody>
      		                  <tr>
      		                     <td align="center" valign="middle"><img class="wide" src="https://sponsors.goodat.co.uk/img/logo/beta.sponsors.goodat.png" alt="" width="200" height="40" border="0" /></td>
      		                  </tr>
      		                  <tr>
      		                  	 <td style="padding: 30px 0;"></td>
      		                  </tr>
      		                  <tr>
      		                  	<td style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">
      		                  		<p>Dear <?= $username ?>,</p>
      		                  		<p>You have recently requested for your password reset.</p>
      		                  		<p>Please click on link below to go to sponsors.goodat.co.uk and reset your password.</p>
      		                  		<p>
      		                  			<a href="<?= Router::url(['controller'=>'Users', 'action' => 'resetPassword', $encode_id], true); ?>">Reset your password</a>
      		                  		<br>
      		                  		<p>Best regards</p>
      		                  		<p>Team Goodat</p>
      		                  	</td>
      		                  </tr>
      		               </tbody>
      		            </table>
      		         </td>
      		      </tr>
      		   </tbody>
      		</table>
      		<!-- End Main content -->
      	</td>
      </tr>
   </tbody>
</table>
