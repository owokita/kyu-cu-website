bootstrapValidate('#email','email:Enter a valid E-Mail Address!'
 );

 bootstrapValidate(['#firstName', '#lastName', '#email', '#regno'], 
 'max:45:Enter no more than 20 characters!'
 );

 bootstrapValidate(['#firstName', '#lastName'], 
 'alpha:45:Only Alphabetic Characters'
 );

 bootstrapValidate('#confirmPassword','matches:#password:Password Must Match'
 );

