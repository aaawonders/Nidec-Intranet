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
        JTextField txField = new JTextField(10);
        JButton Button = new JButton("OK");

        Panel.add(Label);
        Panel.add(txField);
        Panel.add(Button);

        f.add(Panel);
        f.setVisible(true);


        String Texto = txField.toString();

        System.out.println(Texto);

    }
}