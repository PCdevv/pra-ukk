namespace KonversiNilai_24_XIIPPLG1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (int.TryParse(textBox2.Text, out int inputNilai))
            {
                string nama = textBox1.Text;
                string predikat;
                if (inputNilai > 0 && inputNilai <= 100)
                {
                    if (inputNilai > 90)
                    {
                        predikat = "Amat Baik";
                    }
                    else if (inputNilai > 80)
                    {
                        predikat = "Baik";
                    }
                    else if (inputNilai > 70)
                    {
                        predikat = "Cukup Baik";
                    }
                    else if (inputNilai > 60)
                    {
                        predikat = "Cukup";
                    }
                    else
                    {
                        predikat = "Kurang";
                    }
                    textBox3.Text = predikat;
                    label3.Text = $"Hai {nama}, predikat anda :";
                }
                else
                {
                    MessageBox.Show("Masukkan nilai yang valid. (1 - 100)");
                }
            }
            else
            {
                MessageBox.Show("Masukkan nilai yang valid.");
            }
        }
    }
}