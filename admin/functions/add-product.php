<?php $result 	= add_product();?>
<div id="title-header"><div id="title-text">Add Product +</div></div>
<div id="large-content">
	<table width="700" border="0" align="center">
	  <form method="post" onSubmit="return add_product_validate();" enctype="multipart/form-data">
	  <tr>
		<td width="163"><div id="table-header-text">Product Name</div></td>
		<td colspan="3"><input name="product_name" type="text" class="large"/></td>
	  </tr>
	  <tr>
		<td><div id="table-header-text">Item Number</div></td>
		<td colspan="3"><input name="item_no" type="text" class="big"/></td>
	  </tr>
	  <tr>
		<td><div id="table-header-text">Master Model</div></td>
		<td width="178">
			<SELECT NAME="master_model">
				<OPTION VALUE="">Master Model</OPTION>
				<OPTION VALUE="1">Yes</OPTION>
				<OPTION VALUE="0">No</OPTION>
			</SELECT>
		</td>
	    <td width="96"><div id="table-header-text">Master Code:</div> </td>
	    <td width="245"><input name="parent" type="text" class="big"/>
		<i>
		<a href="#" onClick="window.open('show-master-products.php','NewOne','toolbar,height=450,width=400,scrollbars,resizable');return false;">
		(Find Code)</a></i>
		</td>
	  </tr>
	  <tr>
		<td><div id="table-header-text">Short Description</div> </td>
		<td colspan="3"><textarea name="desc_short" cols="50" rows="2"></textarea></td>
	  </tr>
	  <tr>
	    <td><div id="table-header-text">Long Description</div> </td>
	    <td colspan="3"><textarea name="desc_long" cols="50" rows="5"></textarea></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Color</div></td>
	    <td colspan="3"><input name="color" type="text" class="big"/></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Product Cost/List</div></td>
	    <td colspan="3"><input name="cost" type="text" class="big"/></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Product Sell Price </div></td>
	    <td colspan="3"><input name="price" type="text" class="big"/></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Product Wholesale Price </div></td>
	    <td colspan="3"><input name="ws_price" type="text" class="big"/></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Weight</div></td>
	    <td colspan="3"><input name="weight_lbs" type="text" class="big"/></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Website / Display Size</div></td>
	    <td colspan="3"><input name="size" type="text" class="big"/></td>
      </tr>
      <tr>
      	<td><div id="table-header-text">Display Size 2</div></td>
        <td colspan="3"><input name="display_size_2" type="text" class="big" /></td>
        </tr>

<!--	  <tr>
	    <td><div id="table-header-text">OLD Website / Display Size</div></td>
	    <td colspan="3">Length:&nbsp;<input name="size_ln" type="text" size="6"/>&nbsp;Width:&nbsp;<input name="size_wt" type="text" size="6"/>&nbsp;Height:&nbsp;<input name="size_ht" type="text" size="6"/></td>
      </tr>
-->
	  <tr>
	    <td><div id="table-header-text">Alternate Size </div></td>
	    <td colspan="3">Length:&nbsp;<input name="alt_length" type="text" size="6"/>&nbsp;Width:&nbsp;<input name="alt_width" type="text" size="6"/>&nbsp;Height:&nbsp;<input name="alt_height" type="text" size="6"/></td>
      </tr>

	  <tr>
	    <td><div id="table-header-text">Nominal Size </div></td>
	    <td colspan="3">Length:&nbsp;<input name="nominal_length" type="text" size="6"/>&nbsp;Width:&nbsp;<input name="nominal_width" type="text" size="6"/>&nbsp;Height:&nbsp;<input name="nominal_height" type="text" size="6"/></td>
      </tr>


  	  <tr>
	    <td><div id="table-header-text">Shipping Box Size </div></td>
	    <td colspan="3">Length:&nbsp;<input name="ship_length" type="text" size="6"/>&nbsp;Width:&nbsp;<input name="ship_width" type="text" size="6"/>&nbsp;Height:&nbsp;<input name="ship_height" type="text" size="6"/></td>
      </tr>


	  <tr>
	    <td><div id="table-header-text">Shipable</div></td>
	    <td colspan="3">
		<SELECT NAME="shipable">
		<OPTION VALUE="1"> Yes</OPTION>
		<OPTION VALUE="0"> No</OPTION>
		</SELECT>
		</td>
      </tr>

	  <tr>
	    <td><div id="table-header-text">Container</div></td>
	    <td colspan="3">
		<input type="checkbox" name="container" onclick="showoption(this,'option1')"  value="1"/>
		</td>
      </tr>

  	  <tr class="hide" id="option1">
	    <td height="60"><div id="table-header-text">Enter Container Info:</div></td>
	    <td colspan="3" bgcolor="#CCFF66">

		  <table width="500" border="0" cellspacing="2" cellpadding="0" align="center">
			  <tr>
				<td>Length:&nbsp;</td><td><input name="container_length" type="text" size="6"/></td>
				<td>Width:&nbsp;</td><td><input name="container_width" type="text" size="6"/></td>
				<td>Height:&nbsp;</td><td><input name="container_height" type="text" size="6"/></td>
			  </tr>
			  <tr>
				<td>Weight:&nbsp;</td><td><input name="container_weight" type="text" size="6"/></td>
				<td># Per:&nbsp;</td><td><input name="container_amount" type="text" size="6"/></td>
				<td>Price:&nbsp;</td><td><input name="container_price" type="text" size="6"/></td>
			  </tr>
		</table>

	  	</td>
      </tr>



	  <tr>
	    <td><div id="table-header-text">Case</div></td>
	    <td colspan="3">
		<input type="checkbox" name="case" onclick="showoption(this,'option2')" value="1"/>
		</td>
      </tr>


  	  <tr class="hide" id="option2">
	    <td height="60"><div id="table-header-text">Enter Case Info:</div></td>
	    <td colspan="3" bgcolor="#CCFF66">

		  <table width="500" border="0" cellspacing="2" cellpadding="0" align="center">
			  <tr>
				<td>Length:&nbsp;</td><td><input name="box_length" type="text" size="6"/></td>
				<td>Width:&nbsp;</td><td><input name="box_width" type="text" size="6"/></td>
				<td>Height:&nbsp;</td><td><input name="box_height" type="text" size="6"/></td>
			  </tr>
			  <tr>
				<td>Weight:&nbsp;</td><td><input name="box_weight" type="text" size="6"/></td>
				<td># Per:&nbsp;</td><td><input name="box_amount" type="text" size="6"/></td>
				<td>Price:&nbsp;</td><td><input name="box_price" type="text" size="6"/></td>
			  </tr>
		</table>

	  	</td>
      </tr>


	  <tr>
	    <td><div id="table-header-text">Pallet</div></td>
	    <td colspan="3">
		<input type="checkbox" name="pallet" onclick="showoption(this,'option3')" value="1"/>
		</td>
      </tr>

  	  <tr class="hide" id="option3">
	    <td height="60"><div id="table-header-text">Enter Pallet Info:</div></td>
	    <td colspan="3" bgcolor="#CCFF66">

		  <table width="500" border="0" cellspacing="2" cellpadding="0" align="center">
			  <tr>
				<td>Length:&nbsp;</td><td><input name="pallet_length" type="text" size="6"/></td>
				<td>Width:&nbsp;</td><td><input name="pallet_width" type="text" size="6"/></td>
				<td>Height:&nbsp;</td><td><input name="pallet_height" type="text" size="6"/></td>
			  </tr>
			  <tr>
				<td>Weight:&nbsp;</td><td><input name="pallet_weight" type="text" size="6"/></td>
				<td># Per:&nbsp;</td><td><input name="pallet_amount" type="text" size="6"/></td>
				<td>Price:&nbsp;</td><td><input name="pallet_price" type="text" size="6"/></td>
			  </tr>
		</table>

	  	</td>
      </tr>


	  <tr>
	    <td><div id="table-header-text">TruckLoad</div></td>
	    <td colspan="3">
		<input type="checkbox" name="truckload" onclick="showoption(this,'option4')" value="1"/>
		</td>
      </tr>


  	  <tr class="hide" id="option4">
	    <td height="60"><div id="table-header-text">Enter TruckLoad Info:</div></td>
	    <td colspan="3" bgcolor="#CCFF66">

		  <table width="500" border="0" cellspacing="2" cellpadding="0" align="center">
			  <tr>
				<td>Length:&nbsp;</td><td><input name="truckload_length" type="text" size="6"/></td>
				<td>Width:&nbsp;</td><td><input name="truckload_width" type="text" size="6"/></td>
				<td>Height:&nbsp;</td><td><input name="truckload_height" type="text" size="6"/></td>
			  </tr>
			  <tr>
				<td>Weight:&nbsp;</td><td><input name="truckload_weight" type="text" size="6"/></td>
				<td># Per:&nbsp;</td><td><input name="truckload_amount" type="text" size="6"/></td>
				<td>Price:&nbsp;</td><td><input name="truckload_price" type="text" size="6"/></td>
			  </tr>
		</table>

	  	</td>
      </tr>




	  <tr>
	    <td><div id="table-header-text">Inventory Total</div> </td>
	    <td colspan="3"><input name="inv_stocked" type="text" class="big"/></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Enabled</div></td>
	    <td colspan="3">
		<SELECT NAME="enabled">
		<OPTION VALUE="1" selected="selected"> Yes</OPTION>
		<OPTION VALUE="0"> No</OPTION>
		</SELECT>		</td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Category 1</div> </td>
	    <td colspan="3"> <?php require 'includes/generate-category-select-menu.php';?>	</td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Category 2</div> </td>
	    <td colspan="3"><?php require 'includes/generate-category-select-menu2.php';?></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Category 3</div> </td>
	    <td colspan="3"><?php require 'includes/generate-category-select-menu3.php';?></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Associated Products (comma delimited)</div> </td>
	    <td colspan="3"><input name="product_assocs" type="text" class="large"/></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Related Products (comma delimited)</div> </td>
	    <td colspan="3"><input name="product_relatives" type="text" class="large"/></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Meta Description</div> </td>
	    <td colspan="3"><input name="meta_description" type="text" class="large"/></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Meta Keywords</div> </td>
	    <td colspan="3"><input name="meta_keywords" type="text" class="large"/></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Large Image</div> </td>
	    <td colspan="3"><input name="image" type="file"/></td>
      </tr>
	  <tr>
	    <td><div id="table-header-text">Small Image</div> </td>
	    <td colspan="3"><input name="image_small" type="file"/></td>
      </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td colspan="3">&nbsp;</td>
      </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td colspan="3"><input name="addproduct" type="submit" value="Add Product" /></td>
      </tr>
	</form>
	</table>
</div>
