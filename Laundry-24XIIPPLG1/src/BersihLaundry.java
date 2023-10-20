
import javax.swing.JOptionPane;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JFrame.java to edit this template
 */

/**
 *
 * @author lab rpl 1
 */
public class BersihLaundry extends javax.swing.JFrame {

    /**
     * Creates new form BersihLaundry
     */
    public BersihLaundry() {
        initComponents();
        fieldHarga.setEnabled(false);
        fieldTotalHarga.setEnabled(false);
    }
    
    public float totalHarga;
    
    public void reset() {
        optionJenisCuci.setSelectedItem("Pilih");
        fieldBayar.setText("");
        fieldBerat.setText("");
        fieldHarga.setText("");
        fieldTotalHarga.setText("");
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();
        optionJenisCuci = new javax.swing.JComboBox<>();
        fieldBayar = new javax.swing.JTextField();
        fieldHarga = new javax.swing.JTextField();
        fieldBerat = new javax.swing.JTextField();
        fieldTotalHarga = new javax.swing.JTextField();
        batalBtn = new javax.swing.JButton();
        transaksiBtn = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        getContentPane().setLayout(null);

        jPanel1.setBackground(new java.awt.Color(204, 255, 255));
        jPanel1.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jLabel1.setFont(new java.awt.Font("Gill Sans MT", 1, 18)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(0, 0, 0));
        jLabel1.setText("Berat");
        jPanel1.add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(40, 240, -1, -1));

        jLabel2.setFont(new java.awt.Font("Gill Sans Ultra Bold", 0, 24)); // NOI18N
        jLabel2.setForeground(new java.awt.Color(0, 0, 0));
        jLabel2.setText("Bersih Laundry");
        jPanel1.add(jLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(70, 50, -1, -1));

        jLabel3.setFont(new java.awt.Font("Gill Sans MT", 1, 18)); // NOI18N
        jLabel3.setForeground(new java.awt.Color(0, 0, 0));
        jLabel3.setText("Jenis Cuci");
        jPanel1.add(jLabel3, new org.netbeans.lib.awtextra.AbsoluteConstraints(40, 160, -1, -1));

        jLabel4.setFont(new java.awt.Font("Gill Sans MT", 1, 18)); // NOI18N
        jLabel4.setForeground(new java.awt.Color(0, 0, 0));
        jLabel4.setText("Harga/kg");
        jPanel1.add(jLabel4, new org.netbeans.lib.awtextra.AbsoluteConstraints(40, 200, -1, -1));

        jLabel5.setFont(new java.awt.Font("Gill Sans MT", 1, 18)); // NOI18N
        jLabel5.setForeground(new java.awt.Color(0, 0, 0));
        jLabel5.setText("Total Harga");
        jPanel1.add(jLabel5, new org.netbeans.lib.awtextra.AbsoluteConstraints(40, 280, -1, -1));

        jLabel6.setFont(new java.awt.Font("Gill Sans MT", 1, 18)); // NOI18N
        jLabel6.setForeground(new java.awt.Color(0, 0, 0));
        jLabel6.setText("Bayar");
        jPanel1.add(jLabel6, new org.netbeans.lib.awtextra.AbsoluteConstraints(40, 320, -1, -1));

        optionJenisCuci.setFont(new java.awt.Font("Fira Code SemiBold", 0, 14)); // NOI18N
        optionJenisCuci.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "Pilih", "Cuci Basah", "Cuci Kering", "Cuci Setrika" }));
        optionJenisCuci.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                optionJenisCuciActionPerformed(evt);
            }
        });
        jPanel1.add(optionJenisCuci, new org.netbeans.lib.awtextra.AbsoluteConstraints(170, 160, 170, -1));

        fieldBayar.setFont(new java.awt.Font("Fira Code SemiBold", 0, 14)); // NOI18N
        fieldBayar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                fieldBayarActionPerformed(evt);
            }
        });
        jPanel1.add(fieldBayar, new org.netbeans.lib.awtextra.AbsoluteConstraints(170, 320, 170, -1));

        fieldHarga.setFont(new java.awt.Font("Fira Code SemiBold", 0, 14)); // NOI18N
        fieldHarga.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                fieldHargaActionPerformed(evt);
            }
        });
        fieldHarga.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                fieldHargaKeyTyped(evt);
            }
        });
        jPanel1.add(fieldHarga, new org.netbeans.lib.awtextra.AbsoluteConstraints(170, 200, 170, -1));

        fieldBerat.setFont(new java.awt.Font("Fira Code SemiBold", 0, 14)); // NOI18N
        fieldBerat.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                fieldBeratActionPerformed(evt);
            }
        });
        fieldBerat.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                fieldBeratKeyReleased(evt);
            }
        });
        jPanel1.add(fieldBerat, new org.netbeans.lib.awtextra.AbsoluteConstraints(170, 240, 170, -1));

        fieldTotalHarga.setFont(new java.awt.Font("Fira Code SemiBold", 0, 14)); // NOI18N
        fieldTotalHarga.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                fieldTotalHargaActionPerformed(evt);
            }
        });
        jPanel1.add(fieldTotalHarga, new org.netbeans.lib.awtextra.AbsoluteConstraints(170, 280, 170, -1));

        batalBtn.setFont(new java.awt.Font("Gill Sans MT", 0, 14)); // NOI18N
        batalBtn.setText("Batal");
        batalBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                batalBtnActionPerformed(evt);
            }
        });
        jPanel1.add(batalBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(170, 420, -1, -1));

        transaksiBtn.setFont(new java.awt.Font("Gill Sans MT", 0, 14)); // NOI18N
        transaksiBtn.setText("Transaksi");
        transaksiBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                transaksiBtnActionPerformed(evt);
            }
        });
        jPanel1.add(transaksiBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(250, 420, -1, -1));

        getContentPane().add(jPanel1);
        jPanel1.setBounds(0, 0, 380, 510);

        setSize(new java.awt.Dimension(398, 514));
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents

    private void fieldBayarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_fieldBayarActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_fieldBayarActionPerformed

    private void fieldHargaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_fieldHargaActionPerformed
        
    }//GEN-LAST:event_fieldHargaActionPerformed

    private void fieldBeratActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_fieldBeratActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_fieldBeratActionPerformed

    private void fieldTotalHargaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_fieldTotalHargaActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_fieldTotalHargaActionPerformed

    private void batalBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_batalBtnActionPerformed
        reset();
    }//GEN-LAST:event_batalBtnActionPerformed

    private void optionJenisCuciActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_optionJenisCuciActionPerformed
        if (optionJenisCuci.getSelectedItem().toString().equalsIgnoreCase("Pilih")) {
            fieldHarga.setText("");
        } else if (optionJenisCuci.getSelectedItem().toString().equalsIgnoreCase("Cuci Basah")) {
            fieldHarga.setText("3000");
        } else if (optionJenisCuci.getSelectedItem().toString().equalsIgnoreCase("Cuci Kering")) {
            fieldHarga.setText("4000");
        } else if (optionJenisCuci.getSelectedItem().toString().equalsIgnoreCase("Cuci Setrika")) {
            fieldHarga.setText("5000");
        }
    }//GEN-LAST:event_optionJenisCuciActionPerformed

    private void fieldBeratKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_fieldBeratKeyReleased
        float harga =  Float.parseFloat(fieldHarga.getText());
        float berat = Float.parseFloat(fieldBerat.getText());
        totalHarga =  harga * berat;
        fieldTotalHarga.setText(String.valueOf(totalHarga));
    }//GEN-LAST:event_fieldBeratKeyReleased

    private void transaksiBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_transaksiBtnActionPerformed
        if (!fieldBayar.getText().isEmpty() && !fieldBerat.getText().isEmpty()&& !fieldHarga.getText().isEmpty() && !fieldTotalHarga.getText().isEmpty() && !optionJenisCuci.getSelectedItem().toString().equalsIgnoreCase("Pilih")) {
            float bayar = Float.parseFloat(fieldBayar.getText());
            float berat = Float.parseFloat(fieldBerat.getText());
            float kembalian = bayar - totalHarga;            
            if (bayar < 0) {
                JOptionPane.showMessageDialog(null, "Format salah");
                fieldBayar.setText("0");
            } else if (berat < 1) {
                JOptionPane.showMessageDialog(null, "Minimal berat satu kilogram");
            }  else if (bayar >= totalHarga) {
                JOptionPane.showMessageDialog(null, "Kembalian Anda :\n"+ String.valueOf(kembalian));            
            } else {
                JOptionPane.showMessageDialog(null, "Uang Anda kurang");
            }
        } else {
            JOptionPane.showMessageDialog(null, "Semua data harus diisi");
        }
    }//GEN-LAST:event_transaksiBtnActionPerformed

    private void fieldHargaKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_fieldHargaKeyTyped
        
    }//GEN-LAST:event_fieldHargaKeyTyped

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(BersihLaundry.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(BersihLaundry.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(BersihLaundry.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(BersihLaundry.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new BersihLaundry().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton batalBtn;
    private javax.swing.JTextField fieldBayar;
    private javax.swing.JTextField fieldBerat;
    private javax.swing.JTextField fieldHarga;
    private javax.swing.JTextField fieldTotalHarga;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JComboBox<String> optionJenisCuci;
    private javax.swing.JButton transaksiBtn;
    // End of variables declaration//GEN-END:variables
}