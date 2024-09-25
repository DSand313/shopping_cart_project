I created a class that contains all the methods used to build the shopping cart. Outside the class is a few lines of code that allow for an input of item codes as well as their quantity, and a function that allows the user to view the contents of their cart. The contents of the cart is an explicit listing of the flower codes selected from the add_items method along with a total price that include the flower price total, the red flower deal (if applicable), and any potential delivery costs. 

Regarding the methods used, I used 7 total, with only 2 as public. The 5 private methods mostly alter different parts of pricing and eventually all funnel into the view_cart method.

- add_item takes an array with a predefined list of acceptable codes as an argument and this array information gets passed to the private methods.
- red_flower_deal() loops through the associative array that is passed as an input from the add_item method and takes the quantity associated with flower code RF1 and applies the logic for the 'buy one, get one half off' deal to it and returns the price. 
- green_blue_flowers loops through the same add_item associative array from red_flower_deals and returns the price of the green and blue flowers.
- flower_total is mostly an intermediate step to combine the totals from red_flowers_deal and green_blue_flowers, so a single result can be passed into delivery_cost.
- delivery_cost looks at how much the total cost of the flowers is, and tacks on the appropriate delivery charge.
- total_price is the price of all flowers plus delivery. It also loops through the add_items input and inputs a flower code into an empty array every time every time it loops through it. The for loop determines how many times the loop happens. 
# shopping_cart_project
