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

?>

<table cellspacing="0" cellpadding="0" style="width: 100%; background-color:#FFF; color: #999999;">
   <tbody>
      <tr>
      	<td align="center">
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
                                    <p>Dear Admin,</p>
                                    <p>You have received new talent route questions. See details below :</p>
                                    <p><strong>Sender : </strong><?= h($username) ?></p>
                                    <p><strong>Sender email : </strong><?= h($user_email) ?></p>
                                    <p><strong>University : </strong><?= h($university) ?></p>
                                    <p><strong>Study year : </strong><?= h($study_year) ?></p>
                                    <p><strong>Questions : </strong></p>
                                    <?= $questions ?>
                                    <p><br><br></p>
                                    <p>Best regards</p>
                                    <p>Website Goodat</p>
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
