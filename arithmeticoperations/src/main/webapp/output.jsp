<%-- 
    Document   : output
    Created on : 11 Nov 2024, 8:24:20 pm
    Author     : Adam
--%>

<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculation Results</h2>
        <%
            double num1 = Double.parseDouble(request.getParameter("num1"));
            double num2 = Double.parseDouble(request.getParameter("num2"));
            double sum = num1 + num2;
            double diff = num1 - num2;
            double prod = num1 * num2;
            double quot = num1 / num2;
        %>
        <p>Number 1: <%= num1 %></p>
        <p>Number 2: <%= num2 %></p>
        <p>Sum: <%= sum %></p>
        <p>Difference: <%= diff %></p>
        <p>Product: <%= prod %></p>
        <p>Quotient: <%= quot %></p>
    </div>
</body>
</html>
