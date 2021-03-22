// Generated by Selenium IDE
import org.junit.Test;
import org.junit.Before;
import org.junit.After;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.is;
import static org.hamcrest.core.IsNot.not;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.Dimension;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.Alert;
import org.openqa.selenium.Keys;
import java.util.*;
import java.net.MalformedURLException;
import java.net.URL;
public class TestLoginTest {
  private WebDriver driver;
  private Map<String, Object> vars;
  JavascriptExecutor js;
  @Before
  public void setUp() {
    driver = new ChromeDriver();
    js = (JavascriptExecutor) driver;
    vars = new HashMap<String, Object>();
  }
  @After
  public void tearDown() {
    driver.quit();
  }
  @Test
  public void testLogin() {
    // Test name: TestLogin
    // Step # | name | target | value | comment
    // 1 | open | http://localhost/projetoEs/login.php |  | 
    driver.get("http://localhost/projetoEs/login.php");
    // 2 | setWindowSize | 998x692 |  | 
    driver.manage().window().setSize(new Dimension(998, 692));
    // 3 | click | css=label:nth-child(2) .labell |  | 
    driver.findElement(By.cssSelector("label:nth-child(2) .labell")).click();
    // 4 | click | id=cnpj |  | 
    driver.findElement(By.id("cnpj")).click();
    // 5 | type | id=cnpj | 333.333.333/3333-33 | 
    driver.findElement(By.id("cnpj")).sendKeys("333.333.333/3333-33");
    // 6 | click | id=password |  | 
    driver.findElement(By.id("password")).click();
    // 7 | type | id=password | 123 | 
    driver.findElement(By.id("password")).sendKeys("123");
    // 8 | click | css=.form-group:nth-child(11) > .submit |  | 
    driver.findElement(By.cssSelector(".form-group:nth-child(11) > .submit")).click();
  }
}