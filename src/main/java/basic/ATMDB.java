/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package basic;

/**
 *
 * @author harshit
 */
import java.sql.*;
public class ATMDB 
{
    public Connection con;
    public Statement stm;
    public ResultSet rs;
    public PreparedStatement pst;
    
    public ATMDB()
    {
        try 
        {   
            Class.forName("com.mysql.cj.jdbc.Driver");
            
            con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/atmservice","root","");
            
            stm = con.createStatement();
            
        }
        catch(Exception e)
        {
            System.out.println(e);
        }
    }
    
}
