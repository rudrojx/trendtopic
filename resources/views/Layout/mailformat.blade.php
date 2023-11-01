<table>
<tr>
   <td> Hello {{ $data['name'] }},</td>
</tr>
<tr>
<td> Thank you for your message. We have received the following information: </td>
</tr>

<tr><td>   Name: {{ $data['name'] }} </td></tr>
<tr><td>   Email: {{ $data['email'] }} </td></tr>
<tr><td>   Subject: {{ $data['subject'] }} </td></tr>
    <tr>
  <td>      Message:
        {{ $data['message'] }} </td></tr>
<tr>
     <td>   Best regards, </td></tr>
     <tr> <td>  Your Company </td>
</tr>
</table>