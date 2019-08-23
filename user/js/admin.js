bootstrapValidate('#email','email:Enter a valid E-Mail Address!'
 );

 bootstrapValidate(['#firstName', '#lastName', '#email'], 
 'max:45:Enter no more than 20 characters!'
 );

 bootstrapValidate(['#firstName', '#lastName'], 
 'alpha:45:Only Alphabetic Characters'
 );
 bootstrapValidate('#regno', 'min:15:Invalid RegNo!!');

 
 bootstrapValidate('#phoneNo', 'startsWith:7:Phone No. MUST start with 7 ')

 bootstrapValidate('#phoneNo', 'max:9:Max Entry is 9 digits');
 bootstrapValidate('#phoneNo', 'min:9:Minimun Entry is 9 digits');
 bootstrapValidate('#password', 'min:4:Weak Password');
 bootstrapValidate('#confirmPassword','matches:#password:Password Must Match'
 );
 

