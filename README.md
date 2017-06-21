
Simple Shopping Cart API

Please check the following documents:
  
  Git hub url : https://github.com/Sandhyasadhu/shoppingCartOopsApi/tree/shoppingapi

  Heroku url  : https://sheltered-cove-38483.herokuapp.com/category.php

```html

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
