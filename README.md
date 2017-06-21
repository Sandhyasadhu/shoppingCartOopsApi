Simple Shopping Cart API

Please check the following documents:
  
  Git hub url : https://github.com/Sandhyasadhu/shoppingCartOopsApi/tree/shoppingapi

  Heroku url  : https://sheltered-cove-38483.herokuapp.com/category.php
 
```html
CATEGORY:
  AddCategory    : https://sheltered-cove-38483.herokuapp.com/category.php?type=addCategory&username=bs.sandhya.in
  UpdateCategory : https://sheltered-cove-38483.herokuapp.com/category.php?type=updateCategory&username=bs.sandhya.in
  ReadCategory   : https://sheltered-cove-38483.herokuapp.com/category.php?type=readCategory&username=bs.sandhya.in
  ListCategories : https://sheltered-cove-38483.herokuapp.com/category.php?type=listCategories&username=bs.sandhya.in

Product
   AddProduct    : https://sheltered-cove-38483.herokuapp.com/product.php?type=addProduct&username=bs.sandhya.in
   UpdateProduct : https://sheltered-cove-38483.herokuapp.com/product.php?type=updateProduct&username=bs.sandhya.in
   ReadProduct   : https://sheltered-cove-38483.herokuapp.com/product.php?type=readProduct&username=bs.sandhya.in
   ListProducts  : https://sheltered-cove-38483.herokuapp.com/product.php?type=listProducts&username=bs.sandhya.in 

CART:  
  AddCart    : https://sheltered-cove-38483.herokuapp.com/cart.php?type=addCart&username=bs.sandhya.in
  UpdateCart : https://sheltered-cove-38483.herokuapp.com/cart.php?type=updateCart&username=bs.sandhya.in
  ReadCart   : https://sheltered-cove-38483.herokuapp.com/cart.php?type=readCart&username=bs.sandhya.in
  ListCarts  : https://sheltered-cove-38483.herokuapp.com/cart.php?type=listCarts&username=bs.sandhya.in
  ShowCarts  : https://sheltered-cove-38483.herokuapp.com/cart.php?type=showCarts&username=bs.sandhya.in
  GetCartTotal : https://sheltered-cove-38483.herokuapp.com/cart.php?type=getCartTotal&username=bs.sandhya.in
  GetTotalDis  : https://sheltered-cove-38483.herokuapp.com/cart.php?type=getCartTotalDiscount&username=bs.sandhya.in
  GetTotalTax  : https://sheltered-cove-38483.herokuapp.com/cart.php?type=getCartTotalTax&username=bs.sandhya.in
  AddUser      : https://sheltered-cove-38483.herokuapp.com/cart.php?type=addUser&username=bs.sandhya.in


DB:Postgresql

authentication check:
input: 
  username
Output:
  $output['iserr']     = 0; // 0 is fail condition user cannot match
  $output['message']   = 'Invalid User';

Rules: category and product process by only admin (role_id = 1)
Rules: cart process by both user or admin (role_id = 1 or role_id = 2)



Method:Category

1.Type=addCategory
  Input:
    name
    description
    tax
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Category Add';
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

2. Type= updateCategory
  Input:
    name
    description
    tax
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Category Update;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

3. Type= deleteCategory
  Input:
    categoryDeleteId
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Category Delete;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

4. Type= readCategory
  Input:
    categoryReadId
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Category List;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

5. Type= listCategories
  Input:
    null
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Category List;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

Method:Product

1.Type= addProduct
  Input:
    name
    description
    price
    discount
    category_id
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Product Add';
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

2. Type= updateProduct
  Input:
    name
    description
    price
    discount
    productUpdateId
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Product Update;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

3. Type= deleteProduct
  Input:
    productDeleteId
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Product Delete;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

4. Type= readProduct
  Input:
    productReadId
  Output:
    $output['iserr']    = 1; // 1 is successfull
    $output['message']  =	'Successfully Product  List;
    $output['iserr']    =	 0; // 0 is fail
    $output['message']  = 'Invalid Entry';

5. Type= listProducts
  Input:
    null
  Output:
    $output['iserr']    = 1; // 1 is successfull
    $output['message']  = 'Successfully Category List;
    $output['iserr']    = 0; // 0 is fail
    $output['message']  = 'Invalid Entry';


Method:Cart

1.Type= addCart
  Input:
    name
    total
    total_discount
    total_with_discount_id
    total_tax
    total_with_tax
    grand_total
    product_id
    user_id
  Output:
    $output['iserr']    = 1; // 1 is successfull
    $output['message']  = 'Successfully Cart Add';
    $output['iserr']    = 0; // 0 is fail
    $output['message']  = 'Invalid Entry';

2. Type= updateCart
  Input:
    name
    total
    total_discount
    total_with_discount_id
    total_tax
    total_with_tax
    grand_total
    cartUpdateId
  Output:
    $output['iserr']   = 1; // 1 is successfull
    $output['message'] = 'Successfully Cart Update;
    $output['iserr']   = 0; // 0 is fail
    $output['message'] = 'Invalid Entry';

3. Type= deleteCart
  Input:
    cartDeleteId
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Cart Delete;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

4. Type= readCart
  Input:
    cartReadId
  Output:
    $output['iserr']   = 1; // 1 is successfull
    $output['message'] = 'Successfully Cart  List;
    $output['iserr']   = 0; // 0 is fail
    $output['message'] = 'Invalid Entry';

5. Type= listCarts
  Input:
    null
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Category List;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

6. Type= showCarts
  Input:
    user_id
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Category List;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

7. Type= getCartTotal
  Input:
    user_id
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Category List;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

8. Type= getCartTotalDiscount
  Input:
    user_id
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Category List;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

9. Type= getCartTotalTax
  Input:
    user_id
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully Category List;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';

10. Type= addUser
  Input:
    username_add
    first_name
    last_name
    dob
    mobile
  Output:
    $output['iserr']     = 1; // 1 is successfull
    $output['message']   = 'Successfully user  add;
    $output['iserr']     = 0; // 0 is fail
    $output['message']   = 'Invalid Entry';
```
