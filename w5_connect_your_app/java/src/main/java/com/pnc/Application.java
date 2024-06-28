package com.pnc;

import java.sql.*;

public class Application {
    public Application() {
    }

    public static void main(String[] args) {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3400/pnc", "user", "pass");
            PreparedStatement stmt = conn.prepareStatement("INSERT INTO mahasiswa " +
                    "(nama, alamat, email, nik, wilayah_id) " +
                    "VALUES " +
                    "(?, ?, ?, ?, ?)");
            stmt.setString(1, "'ARISSSSS'");
            stmt.setString(2, "Skh");
            stmt.setString(3, "soed@gmail.com");
            stmt.setString(4, "9876");
            stmt.setInt(5, 1);
            stmt.execute();

            ResultSet rs = stmt.executeQuery("SELECT * FROM mahasiswa");
            while (rs.next()) {
                System.out.println("ID: " + rs.getInt("id"));
                System.out.println("Nama: " + rs.getString("nama"));
                // etc ...
            }
        } catch (SQLException e) {
            e.printStackTrace();
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }
    }
}
