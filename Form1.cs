using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Runtime.InteropServices;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace ksiazkaadresowa
{
    public partial class Form1 : Form
    {
        public string ConnectionString = "Server=localhost;Database=ksiazkadresowa;Uid=root;Pwd=;";

        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            ReloadDB();
            
        }
        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        public void SQL(string komenda)
        {
            try
            {
                MySqlConnection connection = new MySqlConnection(ConnectionString);
                connection.Open();
                MySqlCommand cmd = new MySqlCommand(komenda, connection);
                cmd.ExecuteNonQuery();
                connection.Close();
                textBox1.Clear();
                textBox2.Clear();
                textBox3.Clear();
                textBox4.Clear();
                dateTimePicker1.Value = DateTime.Now;
            }
            catch { }
        }
        public void ReloadDB()
        {
            listView1.Clear();
            MySqlConnection connection = new MySqlConnection(ConnectionString);
            connection.Open();
            string zapytanie = "SELECT * FROM people ";
            MySqlDataAdapter da = new MySqlDataAdapter(zapytanie, connection);
            DataSet ds = new DataSet();
            da.Fill(ds);
            connection.Close();

            foreach (DataRow row in ds.Tables[0].Rows)
            {
                ListViewItem item = new ListViewItem(row[0].ToString());
                item.SubItems.Add(row[1].ToString());
                item.SubItems.Add(row[2].ToString());
                item.SubItems.Add(row[3].ToString());
                item.SubItems.Add(row[4].ToString());
                listView1.Items.Add(item);

            }
        }
        private void button1_Click(object sender, EventArgs e)
        {
            string imie, nazwisko, wiek, plec, adres;
            imie = textBox1.Text;
            nazwisko = textBox2.Text;
            wiek = dateTimePicker1.Value.ToString();
            plec = textBox3.Text;
            adres = textBox4.Text;

            string cmd = "Insert into people (`name`, `surname`, `age`, `sex`, `adress`) values ('"+ imie +"','" + nazwisko + "','" + wiek + "','" + plec + "','"+ adres +"')";
            SQL(cmd);
   
            ReloadDB();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            ListViewItem item = listView1.SelectedItems[0];
            string cmd = "DELETE FROM people where `imie`='" + item.SubItems[0].Text.ToString() + "'";
            SQL(cmd);
            listView1.Items.Remove(item); //usuwamy z listy wybraną pozycje
            ReloadDB();
        }

        private void usuńToolStripMenuItem_Click(object sender, EventArgs e)
        {
            ListViewItem item = listView1.SelectedItems[0];
            string cmd ="DELETE FROM people where `imie`='"+item.SubItems[0].Text.ToString()+"'";
            SQL(cmd);
            listView1.Items.Remove(item); //usuwamy z listy wybraną pozycje
            ReloadDB();
        }

        private void listView1_SelectedIndexChanged(object sender, EventArgs e)
        {
            try
            {
                ListViewItem item = listView1.SelectedItems[0];
                textBox1.Text = item.SubItems[0].Text.ToString();
                textBox2.Text = item.SubItems[1].Text.ToString();
                textBox3.Text = item.SubItems[3].Text.ToString();
                textBox4.Text = item.SubItems[4].Text.ToString();
                string data = item.SubItems[2].Text.ToString();
                dateTimePicker1.Value = DateTime.Parse(data);
            }
            catch { }
         }

        private void button3_Click(object sender, EventArgs e)
        {
            ListViewItem item = listView1.SelectedItems[0];
            item.SubItems[0].Text = textBox1.Text;
            item.SubItems[1].Text = textBox2.Text;
            item.SubItems[3].Text = textBox3.Text;
            item.SubItems[4].Text = textBox4.Text;
            item.SubItems[2].Text = dateTimePicker1.Value.ToString();

            string cmd = "UPDATE `people` SET `name`='"+textBox1.Text+"',`surname`=[value-2],`sex`=[value-4],`adress`=[value-5] WHERE 'age' = '" + dateTimePicker1.Value.ToString() + "'";
        }
    }
}
