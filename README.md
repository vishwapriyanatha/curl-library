# curl-library
this is a simple cURL library for codeigniter

you can add this file to your_project\application\libraries
and `$this->load->library('curl')`

for logging purpose I have created the logging function
fot get data `getData` function and for post data `postData` function have
if you need to send json data convert data in to json `json_encode`

`$post_data = json_encode($post_array);`
