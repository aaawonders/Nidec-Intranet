import javax.swing.*;

public class Main {
    public static void main(String[] args) {

        JFrame f = new JFrame();
        JPanel Panel = new JPanel();


        f.setTitle("Janela");
        f.setSize(300,200);
        f.setLocation(500,300);
        f.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        JLabel Label = new JLabel("Teste");
        JButton Button = new JButton("OK");
        JTextField txField = new JTextField();
        /* Button.setBorderPainted(false);
        Button.setFocusPainted(false);
        Button.setContentAreaFilled(false);*/

        Panel.add(Label);
        Panel.add(txField);
        Panel.add(Button);

        f.add(Panel);
        f.setResizable(false);
        f.setVisible(true);

        Button.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                processaTexto();
            }
        });



        //String Texto = txField.getText();

        //System.out.println(Texto);

    }
    static void processaTexto() {
        String texto = txField.getText();
        StringBuilder textoInverso = new StringBuilder();

        for(int i = texto.length()-1; i >= 0; i --){
            textoInverso.append(texto.charAt(i));
        }

        JOptionPane.showMessageDialog(this, "O texto que você digitou na forma inversa: \n "+
                textoInverso.toString().toUpperCase());
    }
}