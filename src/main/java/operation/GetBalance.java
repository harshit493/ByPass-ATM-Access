/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package operation;

import basic.ATMDB;

/**
 *
 * @author HARSHIT
 */
public class GetBalance {
    static ATMDB db;
    
    public static int balance(String accno){
        db = new ATMDB();
        try
        {           
            db.rs = db.stm.executeQuery("select AccBalance from accountdetails where AccNo  = '" + accno + "';");
            //System.out.println("select AccBalance from accountdetails where AccNo  = '" + accno + "';");
            db.rs.next();
              
            int amount = db.rs.getInt("AccBalance");
            
            return amount; 
                  
        }catch(Exception e)
        {
            System.out.println(e);
        }
        return 0;
    }
}
